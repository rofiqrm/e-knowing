<!--================ Start footer Area  =================-->
<footer class="footer-area p_20" style="padding-top: 31px; padding-bottom: 31px;">
    <div class="container">
        <p class="col-lg-8 col-md-8 footer-text m-0">
            © 2020 Copyright: <a class="dn_btn" href="mailto:alrasyidjauhari@gmail.com">alrasyidjauhari</a>
        </p>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Sweetaler Flashdata -->
<?php if ($this->session->flashdata('success-reg')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Kamu berhasil!',
    text: 'Sekarang kamu boleh login!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>

<?php if ($this->session->flashdata('success-upl')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'File Kamu Berhasil Diupload',
    text: 'Jawaban kamu akan kami periksa dan nilainya dapat dilihat di bagian nilai setelah pemeriksaan selesai!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>

<?php if ($this->session->flashdata('success-jwb')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Jawaban kamu telah disubmit',
    text: 'Silakan cek nilai dan kunci jawaban di bagian penutup!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>


<?php if ($this->session->flashdata('login-success')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Kamu berhasil daftar!',
    text: 'Sekarang login yuk!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>


<?php if ($this->session->flashdata('success-verify')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Email Telah Diverifikasi!',
    text: 'Sekarang login yuk!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>


<?php if ($this->session->flashdata('success-logout')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Kamu berhasil logout!',
    text: 'Selamat tinggal, Sampai jumpa lagi!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>


<?php if ($this->session->flashdata('fail-login')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal login!',
    text: 'Silahkan Periksa Kembali Email dan Password Kamu!',
    showConfirmButton: false,
    timer: 2500
});
</script>
<?php endif;?>


<?php if ($this->session->flashdata('fail-email')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Email Belum Diverifikasi!',
    text: 'Silahkan Cek Email Kamu Dahulu!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>


<?php if ($this->session->flashdata('fail-pass')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Password Salah!',
    text: 'Silahkan Periksa Kembali Password Kamu!',
    showConfirmButton: false,
    timer: 2500
});
</script>
<?php endif;?>


<?php if ($this->session->flashdata('not-login')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Harap Login Terlebih Dahulu !',
    text: 'Silahkan Login Dahulu !',
    showConfirmButton: false,
    timer: 2500
});
</script>
<?php endif;?>

<?php if ($this->session->flashdata('false-login')): ?>
<script>
  $("#exampleModalCenter").modal("show")
</script>
<?php endif;?>

<script src="<?=base_url('assets/')?>js/stellar.js"></script>
<script src="<?=base_url('assets/')?>vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/isotope/isotope.pkgd.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url('assets/')?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="<?=base_url('assets/')?>vendors/counter-up/jquery.counterup.js"></script>
<script src="<?=base_url('assets/')?>js/mail-script.js"></script>
<script src="<?=base_url('assets/')?>js/theme.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ee5bf809e5f694422908478/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

</body>

</html>
