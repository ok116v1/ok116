// modal
const openModalBtns = document.querySelectorAll('.openModalBtn');
const modal = document.getElementById('modalForm');
const closeModalBtn = document.getElementById('closeModalBtn');
openModalBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        modal.style.display = 'block';
    });
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
document.addEventListener("DOMContentLoaded", function() {
    const maxSpecialties = 5;
    const specializationsContainer = document.getElementById("specializationsContainer");
    const maxSpecialtiesError = document.getElementById("maxSpecialtiesError");

    specializationsContainer.addEventListener("click", function(e) {
        if (e.target.classList.contains("add-specialty-btn")) {
            const specialtyGroups = specializationsContainer.querySelectorAll(".specialty-group");
            if (specialtyGroups.length < maxSpecialties) {
                const newSpecialtyGroup = document.createElement("div");
                newSpecialtyGroup.classList.add("specialty-group");
                newSpecialtyGroup.innerHTML = `
                    <select name="specialization[]" required>
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->name }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantity[]" placeholder="Количество" required min="1">
                    <button type="button" class="remove-specialty-btn">-</button>
                `;
                specializationsContainer.appendChild(newSpecialtyGroup);
                maxSpecialtiesError.style.display = 'none'; // Скрываем сообщение об ошибке
            } else {
                maxSpecialtiesError.style.display = 'block'; // Показываем сообщение об ошибке
            }
        }
    });

    specializationsContainer.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-specialty-btn")) {
            e.target.closest(".specialty-group").remove(); // Удаляем выбранную группу специальностей
        }
    });
});


// Открытие модального окна для входа
document.getElementById('openLoginModalBtn').onclick = function() {
    document.getElementById('loginModal').style.display = 'block';
}

// Закрытие модального окна для входа
document.getElementById('closeLoginModalBtn').onclick = function() {
    document.getElementById('loginModal').style.display = 'none';
}

// Открытие модального окна для регистрации
document.getElementById('openRegisterModalBtn').onclick = function() {
    document.getElementById('registerModal').style.display = 'block';
}

// Закрытие модального окна для регистрации
document.getElementById('closeRegisterModalBtn').onclick = function() {
    document.getElementById('registerModal').style.display = 'none';
}

// Закрытие модальных окон при клике вне их области
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}