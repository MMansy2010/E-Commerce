    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search" id="searchInput"/>
    <button type="submit" class="btn btn-success rounded-pill px-4">
      Search
    </button>
  </form>
</div>

<script>
  const filterDropdown = document.getElementById('filterDropdown');
  const hiddenFilter = document.getElementById('filterSelect');

  document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      const value = this.getAttribute('data-value');
      hiddenFilter.value = value;
      filterDropdown.innerHTML = `<i class="bi bi-filter me-2"></i> ${this.textContent}`;
    });
  });

  function validateFilter() {
    if (!hiddenFilter.value) {
      alert("Please select a filter option!");
      return false;
    }
    const searchValue = document.getElementById('searchInput').value;
    location.href = `index.php?search=${encodeURIComponent(searchValue)}&filter=${encodeURIComponent(hiddenFilter.value)}`;
    return false;
  }
  
  document.getElementById('searchInput').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault(); 
      location.href = 'index.php?search=' + this.value;
    }
  });
</script>