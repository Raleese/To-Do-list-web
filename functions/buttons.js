// Complete button
function setCompleted(button, id){
    const todoText = button.parentElement.querySelector('.todo-text');

    button.classList.toggle('orange-button')
    todoText.classList.toggle('completed')
}

// Delete button
function deleteItem(id) {
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'delete_id=' + encodeURIComponent(id)
    }).then(response => {
        if (response.ok) {
            // Remove the item from the DOM after successful deletion
            document.getElementById('item-' + id).remove();
        }
    });
}