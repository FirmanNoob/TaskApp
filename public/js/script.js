// $(document).ready(function () {

//     semuaData();

//     function semuaData() {
//         $.ajax({
//             url: 'https://api.kawalcorona.com/indonesia',
//             success: function (data) {
//                 try {
//                     var json = data;
//                     var kasus = data.positif;
//                     var meninggal = data.meninggal;
//                     var sembuh = data.sembuh;

//                     // $('#data-kasus').html(kasus);
//                 } catch {
//                     alert('Error');
//                 };
//             }
//         });
//     };

// })
$.getJSON('https://api.kawalcorona.com/indonesia', function (data) {
    // let menu = data.menu;
    $.each(function (i, data) {
        $('#camping').append(`
        <div class="animated flipInY col-lg-6 col-md-6 col-sm-6">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count">`+ data.name + `</div>
          <h3>`+ data.name + `</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
         </div>`)
    });
});