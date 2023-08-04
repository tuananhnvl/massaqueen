

$( document ).ready(function() {
    const listBtnOnForm = document.querySelectorAll('#close-dropdown-content');
  

$(listBtnOnForm).each(function( index ) {
    $(this).on('click',function() {
        $('#customSelectsdfghb').removeClass('show');
        console.log('helo')
     })
});

const listbtnVoucher = document.querySelectorAll('#open-modal-vouchers');
$(listbtnVoucher).each(function( index ) {
    $(this).on('click',function() {
   
        console.log($(this).parent().children('span').html())
        $('#custom-modal-voucher').addClass('show-modal-voucher-style')
        closeModalVoucher() 
        actionsend($(this).parent().children('span').html())
       
       
     })
});


function actionsend(b) {
    $('#booking-wt-voucher').on('click',function(event) {
        event.preventDefault();
        SendMailWVoucher($(this),b)
    })
}
function closeModalVoucher() {
    $('#close-modal-voucher').on('click',function() {
        $('#custom-modal-voucher').removeClass('show-modal-voucher-style')
        clearMutiInput() 
    })
}
function clearMutiInput() {
    $('#value-typeservices').html(`<span id="value-typeservices">Chọn gói dịch vụ</span>`);
    $("[name=booking-date]").val('');
    $('#value-nameclient').val('');
    $('#value-contactclient').val('');
}
function SendMailWVoucher(domvoucher,codevoucher) {
    var linksendmailaction ='';
    var valueTypeServicesCL =  $('#value-typeservices').html();
    var valueDateBookingCL =  $("[name=booking-date]").val();
    var valueNameClientCL =  $('#value-nameclient').val();
    var valueContactClientCL =  $('#value-contactclient').val();
    var el = domvoucher;
  
    if(valueContactClientCL == '') {
       toastr.error("Điền thông tin liên hệ!");
    }else{
       buttonBeginLoading( el, 'booking-send' ); //open loading send
       AnalysLinktoActionMail()
       function AnalysLinktoActionMail() {
          const paragraphUrlLink = document.location.toString();
          console.log(paragraphUrlLink)
          const regexUrlLink = /(http:\/\/massagequeen.vn\/)|([a-z0-9-]{3,20}\/)|([a-z0-9-]{3,20}\/)/g;
          const foundUrlLink = paragraphUrlLink.match(regexUrlLink);
       
          var countlengthfoundUrlLink = foundUrlLink.length -1;
          console.log(countlengthfoundUrlLink);
          if(foundUrlLink.length > 1) {
              for(let i = 0; i< foundUrlLink.length; i++) {
                  if( i == countlengthfoundUrlLink){
                      linksendmailaction += './'
                  }else{
                      linksendmailaction += '../'
                  }
              }
          }else{
              linksendmailaction += './'
          }
        
          linksendmailaction += 'sendmail/sendmail.php'
          console.log(linksendmailaction)
       }
       $.ajax({
          type:"POST", // define method post or get
          url:`${linksendmailaction}`, 
          data:{
             activevoucher:'activevoucher',
             codevoucher:codevoucher,
             valueTypeServicesCL:valueTypeServicesCL,
             valueDateBookingCL:valueDateBookingCL,
             valueNameClientCL:valueNameClientCL,
             valueContactClientCL:valueContactClientCL
          }, // binds your form data
          dataType:'json', // server response data type, use 'html' 'json' etc
          
          success:function(data){
              console.log(data)
              toastr.success("Gửi thành công !");
              buttonEndLoading( el, 'booking-send', 'Đặt phòng' );
              $('#custom-modal-voucher').removeClass('show-modal-voucher-style')
              clearMutiInput()
              location.reload();
          },
          error:function( xhr, status, errorThrown ) {
          
          console.log( "Error: " + errorThrown );
          console.log( "Status: " + status );
          console.dir( xhr );
          toastr.error("Hệ thống đặt phòng tạm thời không hoạt động, Xin vui lòng quay lại sau!");
          buttonEndLoading( el, 'booking-send', 'Đặt phòng' );
          location.reload();
          },
      });
    }
}
});