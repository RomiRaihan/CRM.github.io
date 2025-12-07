// login

// Toggle hamburger menu visibility
// Auto-slide every 3 seconds
const hamburger = document.getElementById("hamburger");
navbarNav = document.querySelector(".navbar-nav");

hamburger.addEventListener("click", () => {
  navbarNav.classList.toggle("active");
  hamburger.classList.toggle("showx");
});

// tombol untuk membuka popup

document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.querySelector(".open");
  const popup = document.querySelector(".produk");
  const closeBtn = document.querySelector(".close-x");

  openBtn.addEventListener("click", () => {
    popup.classList.add("active");
  });

  closeBtn.addEventListener("click", () => {
    popup.classList.remove("active");
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const tambahBtn = document.querySelector(".buka");
  const popup = document.querySelector(".produk");
  const closeBtn = document.querySelector(".close-x");

  tambahBtn.addEventListener("click", () => {
    popup.classList.add("active");
  });

  closeBtn.addEventListener("click", () => {
    popup.classList.remove("active");
  });
});
const filter = document.getElementById("categoryFilter"); // dropdown
const customerRows = document.querySelectorAll(".container-data-pelanggan"); // setiap baris

filter.addEventListener("change", function () {
  const selected = this.value.toLowerCase(); // ambil value dari dropdown

  customerRows.forEach((row) => {
    // ambil kolom status (p terakhir)
    const statusP = row.querySelector("p:last-of-type");
    if (!statusP) return;
    const status = statusP.textContent.trim().toLowerCase();

    // tampilkan atau sembunyikan
    if (selected === "all" || status === selected) {
      row.style.display = "flex"; // karena layout div kemungkinan flex
    } else {
      row.style.display = "none";
    }
  });
});

const searchInput = document.getElementById("search-input");
const searchBtn = document.getElementById("search-btn");

function liveSearch() {
  const searchText = searchInput.value.trim().toLowerCase();

  customerRows.forEach((row) => {
    // ID pelanggan (hapus prefix "cus" jika ada)
    let idText =
      row.querySelector(".idPelanggan")?.textContent.trim().toLowerCase() || "";
    idText = idText.replace(/^cus/, "");

    // Nama
    const nama =
      row.querySelector(".nama")?.textContent.trim().toLowerCase() || "";

    // Tampilkan row jika cocok
    if (idText.includes(searchText) || nama.includes(searchText)) {
      row.style.display = "flex";
    } else {
      row.style.display = "none";
    }
  });
}

searchInput.addEventListener("input", liveSearch);

searchBtn.addEventListener("click", () => {
  searchInput.value = "";
  liveSearch();
});
