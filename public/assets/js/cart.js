// public/js/cart.js

document.addEventListener('DOMContentLoaded', function() {
    var quantities = document.querySelectorAll('.quantity');
    var removeButtons = document.querySelectorAll('.remove');

    quantities.forEach(function(quantity) {
        quantity.addEventListener('change', updateTotal);
    });

    removeButtons.forEach(function(button) {
        button.addEventListener('click', removeItem);
    });

    function updateTotal() {
        var total = 0;
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var price = parseFloat(row.cells[1].textContent.replace('$', ''));
            var quantity = parseInt(row.cells[2].querySelector('.quantity').value);
            var subtotal = price * quantity;
            row.cells[3].textContent = '$' + subtotal.toFixed(2);
            total += subtotal;
        });

        // Update total at the end of the table
        document.querySelector('tfoot td:last-child').textContent = '$' + total.toFixed(2);
    }

    function removeItem() {
        var row = this.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotal();
    }
});


