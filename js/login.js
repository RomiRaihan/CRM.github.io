document
  .querySelector(".toggle-password")
  .addEventListener("click", function (e) {
    e.preventDefault(); // Menghindari form submit
    const passwordField = document.querySelector('input[name="password"]');
    const eyeIcon = this.querySelector(".fa-eye");
    const eyeSlashIcon = this.querySelector(".fa-eye-slash");

    // Toggle password visibility
    if (passwordField.type === "password") {
      passwordField.type = "text"; // Tampilkan password
      eyeIcon.style.display = "none"; // Sembunyikan ikon mata
      eyeSlashIcon.style.display = "block"; // Tampilkan ikon mata dengan garis
    } else {
      passwordField.type = "password"; // Sembunyikan password
      eyeIcon.style.display = "block"; // Tampilkan ikon mata
      eyeSlashIcon.style.display = "none"; // Sembunyikan ikon mata dengan garis
    }
  });

// Menyembunyikan ikon ketika input kehilangan fokus dan kosong
document
  .querySelector('input[name="password"]')
  .addEventListener("blur", function () {
    const passwordField = document.querySelector('input[name="password"]');
    const toggleButton = document.querySelector(".toggle-password");

    // Periksa apakah input kosong atau tidak
    if (passwordField.value === "") {
      toggleButton.style.display = "none"; // Sembunyikan ikon saat input kosong
    }
  });

// Menampilkan ikon kembali saat input password difokuskan
document
  .querySelector('input[name="password"]')
  .addEventListener("focus", function () {
    const toggleButton = document.querySelector(".toggle-password");
    toggleButton.style.display = "block"; // Tampilkan ikon saat input fokus
  });
