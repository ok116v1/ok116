// modal
const openModalBtn = document.getElementById('openModalBtn');
const modal = document.getElementById('modalForm');
const closeModalBtn = document.getElementById('closeModalBtn');
openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
});
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

// new string for form
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.querySelector('.add-specialty-btn');
    const specializationsContainer = document.getElementById('specializationsContainer');
    
    addButton.addEventListener('click', function() {
        const newGroup = document.createElement('div');
        newGroup.classList.add('specialty-group');
        
        newGroup.innerHTML = `
            <select name="specialization" required>
                <option value="Специальность 1">Специальность 1</option>
                <option value="Специальность 2">Специальность 2</option>
                <option value="Специальность 3">Специальность 3</option>
            </select>
            <input type="number" name="quantity" placeholder="Количество" required min="1">
            <button type="button" class="remove-specialty-btn">Удалить</button>
        `;
        
        specializationsContainer.appendChild(newGroup);
        
        const removeButton = newGroup.querySelector('.remove-specialty-btn');
        removeButton.addEventListener('click', function() {
            specializationsContainer.removeChild(newGroup);
        });
    });
});
