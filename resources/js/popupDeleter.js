const deleteButton = document.querySelectorAll('form.popupDel');
deleteButton.forEach((buttonElement) => {
    buttonElement.addEventListener('submit', function (event) {
        event.preventDefault();
        const buttonElementName = buttonElement.getAttribute('data-element-name');
        const confirmPopup = window.confirm(`You want to delete: ${buttonElementName} ?`);
        if (confirmPopup) this.submit();
    })

});