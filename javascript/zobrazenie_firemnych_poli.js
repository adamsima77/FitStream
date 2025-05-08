document.getElementById('check').addEventListener('change', function () {
    var companyFields = document.getElementById('firemne_udaje');
    companyFields.style.display = this.checked ? 'block' : 'none';
  });