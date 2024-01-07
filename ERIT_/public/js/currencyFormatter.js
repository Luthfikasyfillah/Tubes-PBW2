const formatter = new Intl.NumberFormat('id-ID', {
  style: 'currency',
  currency: 'IDR',
  minimumFractionDigits: 2
})

if (document.querySelectorAll('.formatUang') != null) {
  document.querySelectorAll('.formatUang').forEach(function (el) {
    el.innerHTML = formatter.format(parseInt(el.innerHTML))
  });
}




document.querySelectorAll('.cardJenis').forEach(function (el) {
  el.addEventListener("click", function() {
    if (this.parentElement.querySelector('.bg-blue-800') != null) {
      this.parentElement.querySelector('.bg-blue-800 .titleCard').classList.remove('text-slate-200')
      this.parentElement.querySelector('.bg-blue-800 .titleCard').classList.add('text-gray-500')
      this.parentElement.querySelector('.bg-blue-800 .formatUang').classList.remove('text-white')
      this.parentElement.querySelector('.bg-blue-800').classList.remove('bg-blue-800')
    }
    this.classList.add('bg-blue-800')
    this.querySelector('.titleCard').classList.remove('text-gray-500');
    this.querySelector('.titleCard').classList.add('text-slate-200');
    this.querySelector('.formatUang').classList.add('text-white');
  })
});


// KALO PEMASUKAN DIKLIK
if (document.querySelector('.cardPemasukan')) {
  document.querySelector('.cardPemasukan').addEventListener("click", function () {
    document.querySelectorAll('.atributPemasukan').forEach(function (el) {
      el.classList.remove('hidden');
    });
    document.querySelectorAll('.atributPengeluaran').forEach(function (el) {
      el.classList.add('hidden');
    });
    document.querySelectorAll('.atributTabungan').forEach(function (el) {
      el.classList.add('hidden');
    });
  })
}

// // KALO PENGELUARAN DIKLIK
if (document.querySelector('.cardPengeluaran')) {
  document.querySelector('.cardPengeluaran').addEventListener("click", function () {
    document.querySelectorAll('.atributPemasukan').forEach(function (el) {
      el.classList.add('hidden');
    });
    document.querySelectorAll('.atributPengeluaran').forEach(function (el) {
      el.classList.remove('hidden');
    });
    document.querySelectorAll('.atributTabungan').forEach(function (el) {
      el.classList.add('hidden');
    });
  })
}

// // KALO TABUNGAN DIKLIK
if (document.querySelector('.cardTabungan')) {
  document.querySelector('.cardTabungan').addEventListener("click", function () {
    document.querySelectorAll('.atributPemasukan').forEach(function (el) {
      el.classList.add('hidden');
    });
    document.querySelectorAll('.atributPengeluaran').forEach(function (el) {
      el.classList.add('hidden');
    });
    document.querySelectorAll('.atributTabungan').forEach(function (el) {
      el.classList.remove('hidden');
    });
  })
}