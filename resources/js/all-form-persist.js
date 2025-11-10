//all-form-persist.js


//Keeps form inputs persistent across manual reloads for any form that has the data-persist="true" attribute.
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form[data-persist="true"]');


    forms.forEach(form => {
        //It storageKeyPrefix to the value of form.dataset.storagePrefix if it exists, otherwise to form.id, and if neither is set, defaults to 'form_'
        const storageKeyPrefix = form.dataset.storagePrefix || form.id || 'form_';
        
        //It supprts these values: text, number, float, textarea & select
        const inputs = form.querySelectorAll(
            'input[type="text"], input[type="number"], input[type="float"], textarea, select, input[type="datetime-local"]'
        );

        // Restore the saved values from localStorage
        inputs.forEach(input => {
            //This code creates a key by combining storageKeyPrefix and input.name, then retrieves the corresponding saved value from localStorage.
            const key = `${storageKeyPrefix}_${input.name}`;
            const savedValue = localStorage.getItem(key);

            //If there is a saved value, set the input's value to the saved value if the input is a SELECT, or if the input's value is currently empty.
            if (savedValue !== null) {
                if (input.tagName === 'SELECT') {
                    input.value = savedValue;
                } else if (!input.value) {
                    input.value = savedValue;
                }
            }
        });

        //Save it on input or change
        inputs.forEach(input => {
            const key = `${storageKeyPrefix}_${input.name}`;

            const saveValue = () => {
                localStorage.setItem(key, input.value);
            };

            input.addEventListener('input', saveValue);
            input.addEventListener('change', saveValue);
        });

        //Clears the storage after submission
        form.addEventListener('submit', () => {
            inputs.forEach(input => {
                const key = `${storageKeyPrefix}_${input.name}`;
                localStorage.removeItem(key);
            });
        });
    });
});
