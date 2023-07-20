// @source Example starter Javascript on https://getbootstrap.com/docs/5.3/forms/validation/#custom-styles

// Disable form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', e => {
            if (!form.checkValidity()) {
                e.preventDefault()
                e.stopPropagation()
            }
            
            form.classList.add('was-validated')
            // Fetch the forms' feedback we want to display in consequence
            form.querySelector('.text-danger').classList.remove('invisible')
            
            // For forms which needs only at least one input filled
            if (form.classList.contains('custom-needs-at-least-one-input')) {
                // A manual hard-coded list to improve security a little
                const authorizedForms = ['form-user-bet'];
                if ((authorizedForms.includes(form.id))) {
                    Array.from(form.querySelectorAll('input')).forEach(i => {
                        if(i.value.trim()) {
                            // Submit form because at least input is not empty
                            e.target.submit()
                        }
                    })
                }
            }
        }, false)
    })
})()