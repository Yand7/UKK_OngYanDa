 <!-- Footer -->
 <footer class="content-footer footer bg-footer-theme">
     <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
         <div class="mb-2 mb-md-0">

         </div>
         <div>

         </div>
     </div>
 </footer>
 <!-- / Footer -->

 <div class="content-backdrop fade"></div>
 </div>
 <!-- Content wrapper -->
 </div>
 <!-- / Layout page -->
 </div>

 <!-- Overlay -->
 <div class="layout-overlay layout-menu-toggle"></div>
 </div>
 <!-- / Layout wrapper -->

 <div class="buy-now">
     <!-- <button id="scrollToTopBtn" class="btn btn-dark btn-buy-now"><i class="bx bx-chevrons-up"></i></button> -->

     <button class="btn btn-success btn-buy-now" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
         aria-controls="offcanvasEnd">
         <!-- Checkout -->
         <i class="bx bx-cart"></i>
     </button>

 </div>

 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
     <div class="offcanvas-header">
         <h5 id="offcanvasEndLabel" class="offcanvas-title">Cart</h5>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body mb-auto mx-0 flex-grow-0">
         <form action="<?= base_url('ConCart/checkout')?>" method="post" enctype="multipart/form-data">
             <?php
            $grandTotal = 0; // Initialize the Grand Total variable outside the loop
 
            foreach ($c as $data) {
        ?>
             <div class="card shadow-none bg-transparent border border-success mb-3">
                 <div class="card-body">

                     <input type="hidden" name="brg[]" value="<?= $data->id_barang?>">
                     <input type="hidden" name="jmlh[]" value="<?= $data->jumlah?>">
                     <input type="hidden" name="ttl[]" value="<?= $data->jumlah * $data->harga?>">

                     <p class="card-text"><?= $data->nm_barang ?></p>
                     <p class="card-text">Jumlah: <?= $data->jumlah ?></p>
                     <p class="card-text">Total:
                         Rp<?= number_format(floor($data->jumlah * $data->harga), 0, ',', '.') ?>
                     </p>             
                    <button type="button" class="btn btn-danger delete-btn" data-id="<?= $data->id_cart ?>"
                         onclick="deleteItem(this)"><i class="bx bx-trash"></i></button>
                 </div>
             </div>
             <?php
            $grandTotal += floor($data->jumlah * $data->harga);
        }?>

             <input type="hidden" name="gt" value="<?= $grandTotal?>">
             <p class="card-text">Grand Total: Rp<?= number_format($grandTotal, 0, ',', '.') ?></p>
             <select class="form-select" id="" aria-label="" name="pl">
                <?php foreach ($p as $mdl) { ?>
                <option hidden>Pilih Pelanggan</option>
                <option class="" value="<?= $mdl->id_pelanggan ?>">
                    <?= $mdl->nm_pelanggan ?>
                </option>
                <?php } ?>
            </select>       
             <button type="submit" class="btn btn-primary mt-3 mb-2 d-grid w-100">Checkout</button>
         </form>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <script>
function deleteItem(button) {
    var id = button.getAttribute('data-id');

    // Find and remove the corresponding item from the DOM
    var cardToRemove = document.querySelector('.card[data-id="' + id + '"]');
    if (cardToRemove) {
        cardToRemove.remove();
    } else {
        console.log('Error: Card not found for id ' + id);
    }

    // Perform your delete operation using Fetch API or other methods
    var deleteURL = '<?= base_url() ?>/ConCart/delete_cart/' + id;
    fetch(deleteURL, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data && data.success) {
                console.log('Item deleted successfully.');

                // Reload the page immediately
                location.reload();
            } else {
                console.log('Failed to delete item or invalid response format.');
            }
        })
        .catch(error => {
            console.error('Error in fetch:', error);
        });
}
 </script>




 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->
 <script src="<?= base_url('/templet1/assets/vendor/libs/jquery/jquery.js')?>"></script>
 <script src="<?= base_url('/templet1/assets/vendor/libs/popper/popper.js')?>"></script>
 <script src="<?= base_url('/templet1/assets/vendor/js/bootstrap.js')?>"></script>
 <script src="<?= base_url('/templet1/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

 <script src="<?= base_url('/templet1/assets/vendor/js/menu.js')?>"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="<?= base_url('/templet1/assets/vendor/libs/apex-charts/apexcharts.js')?>"></script>

 <!-- Main JS -->
 <script src="<?= base_url('/templet1/assets/js/main.js')?>"></script>

 <script src="<?= base_url('/templet1/assets/js/form-basic-inputs.js')?>"></script>

 <!-- Page JS -->
 <script src="<?= base_url('/templet1/assets/js/dashboards-analytics.js')?>"></script>

 <script src="<?= base_url('assets/extensions/jquery/jquery.min.js')?>"></script>
 <script src="<?= base_url('assets/extensions/datatables.net/js/jquery.dataTables.min.js')?>"></script>
 <script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')?>"></script>
 <script src="<?= base_url('assets/static/js/pages/datatables.js')?>"></script>

 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 </body>

 </html>