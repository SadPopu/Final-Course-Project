var filterBtns = document.querySelectorAll('#filters .btn');

var items = document.querySelectorAll('#items .item');

for (var i = 0; i < filterBtns.length; i++) {
  filterBtns[i].addEventListener('click', function() {
    for (var j = 0; j < filterBtns.length; j++) {
      filterBtns[j].classList.remove('active');
    }
    this.classList.add('active');
    
    var filterValue = this.getAttribute('data-filter');
    
    for (var k = 0; k < items.length; k++) {
      if (items[k].classList.contains(filterValue)) {
        items[k].style.display = 'block';
      } else {
        items[k].style.display = 'none';
      }
    }
  });
}
