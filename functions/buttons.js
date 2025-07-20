const buttons = document.querySelectorAll('.complete-button');

buttons.forEach(function(button){
    button.addEventListener('click', function(){
        const todoText = this.parentElement.querySelector('.todo-text');
        button.classList.toggle('orange-button')

        todoText.classList.toggle('completed')
    })
})