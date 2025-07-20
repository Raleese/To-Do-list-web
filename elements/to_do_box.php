<div class="todo-container" id="item-<?= $id ?>">
    <button onclick="setCompleted()" class="complete-button"></button>
    <p class="todo-text"><?php echo htmlspecialchars($task) ?></p>
    <button onclick="deleteItem(<?= $id ?>)" class="delete-button">
        <h2>X</h2>
    </button>
</div>