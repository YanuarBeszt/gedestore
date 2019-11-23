// const flash = $('.flash-data').data('flashdata');
// console.log(flash);


      $('.tombol-selesai').on('click', function (e) {
          e.preventDefault();
          // console.log(e);
          const link = $(this).attr('href');

          Swal.fire({
                      title: 'Apakah Anda Yakin ?',
                      text: "Pesanan ini akan selesai",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ya, pesanan ini selesai!'
                    }).then((result) => {
                      if (result.value) {

                          document.location.href = link;
                      }
            })

      });




      $('.tombol-batal').on('click', function (e) {
          e.preventDefault();
          // console.log(e);
          const link = $(this).attr('href');

          Swal.fire({
                      title: 'Apakah Anda Yakin ?',
                      text: "Pesanan ini akan dibatalkan",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ya, pesanan ini dibatalkan!'
                    }).then((result) => {
                      if (result.value) {

                          document.location.href = link;
                      }
            })

      });




        const flash = $('.flash-data').data('flashdata');
        if (flash) {
          Swal.fire({
              title: 'Data',
              text: 'Berhasil ' + flash,
              type: 'success'
          });
        }



        const alert = $('.flash-alert').data('flashalert');
        if (alert) {
          Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Gagal ' + alert,
                   });
        }
