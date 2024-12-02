
document.querySelectorAll('.students-table .open, .students-table .closed').forEach(item => {
    item.addEventListener('click', function () {
        if (this.classList.contains('open')) {
            this.classList.remove('open');
            this.classList.add('closed');
            this.textContent = 'closed';
        } else {
            this.classList.remove('closed');
            this.classList.add('open');
            this.textContent = 'open';
        }
    });
});
