document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.contactInput');
    const contactForm = document.querySelector('#contactForm');

    const errors = {
        firstname: document.querySelector('#errorfirstname'),
        lastname: document.querySelector('#errorlastname'),
        email: document.querySelector('#erroremail'),
        phone_number: document.querySelector('#errorphone_number'),
        message: document.querySelector('#errormessage'),
    }

    contactForm.addEventListener('submit', (form) => {
        form.preventDefault();
        inputs.forEach((input) => {
            !input.value ? errors[input.name].textContent = 'Deze veld is verplicht' : form.target.submit();
        })
    })
})
