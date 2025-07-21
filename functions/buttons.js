// Complete button
function setCompleted(id){
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', 
        },
        body: 'completed_id=' + encodeURIComponent(id)
    }).then(response=> {
        if (response.ok){
            crossText(id);
        }
    })
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

// Helper method
function crossText(id){
    const todoButton = document.getElementById("item-" + id).querySelector('.complete-button');
    const todoText = document.getElementById("item-" + id).querySelector('.todo-text');

    todoButton.classList.toggle('orange-button')
    todoText.classList.toggle('completed')
}