{
    let fetchData = async function fetchData(route, form, relations = []) {

        let fetchFieldWrapper = form.querySelectorAll('.fetch-field-wrapper')

        fetchFieldWrapper?.forEach(el=>{
            el.classList.add('loading')
        })

        let response = await fetch(route);
        if (response.status === 200) {
            let data = await response.json();
            if (data.success) {

                fetchFieldWrapper?.forEach(el=>{
                    el.classList.remove('loading')
                })

                data = data.data;

                let formData = new FormData(form);
                let keyWithoutArray;
                for (let [key] of formData) {
                    if (key.endsWith("[]")) {
                        keyWithoutArray = key.replace("[", "").replace("]", "");
                        if (keyWithoutArray in data) {
                            insertValueOnField(key, form, data);
                        }
                    }

                    if (key in data) {
                        insertValueOnField(key, form, data);
                    }

                    if (relations?.length) {
                        relations.forEach((relation) => {
                            if (key.endsWith("[]")) {
                                if (keyWithoutArray in data[relation]) {
                                    insertValueOnField(
                                        key,
                                        form,
                                        data[relation]
                                    );
                                }
                            }

                            if (key in data[relation]) {
                                insertValueOnField(key, form, data[relation]);
                            }
                        });
                    }
                }
            }
        }
    };

    let submit = async function submit(route, form, method) {
        let formData = new FormData(form);
        formData.append(
            "_token",
            document.querySelector('meta[name="csrf-token"]').content
        );
        if (method !== "POST") {
            formData.append("_method", method);
        }

        form.querySelector('button[type="submit"]')?.classList.add(
            "cursor-not-allowed",
            "bg-opacity-60"
        );
        await fetch(route, {
            headers: {
                Accept: "application/json",
            },
            method: "post",
            body: formData,
        })
            .then((response) => {
                if (!response.ok) {
                    throw response;
                }

                location.reload();
                // form.parentElement.classList.add("hidden");
                // form.reset();
            })
            .catch((errors) => {
                errorHandler(errors, form);
            });
    };

    function insertValueOnField(index, form, data) {
        if (index.endsWith("[]")) {
            let multipleSelectFields =
                form.querySelectorAll("select[multiple]");
            if (multipleSelectFields.length) {
                processForMultipleSelect(
                    index,
                    form,
                    multipleSelectFields,
                    data
                );
                return;
            }
        }

        let field = form.querySelectorAll(`[name=${index}]`)[0];
        let options;
        if (field.type === "text" || field.type === "date") {
            field.value = data[index];
        } else if (field.type === "radio") {
            form.querySelectorAll(`[name=${index}]`).forEach((radio) => {
                if (radio.hasAttribute("checked")) {
                    radio.removeAttribute("checked");
                }

                if (radio.value === data[index]) {
                    radio.setAttribute("checked", true);
                }
            });
        } else if (field.type === "textarea") {
            field.innerHTML = data[index];
        } else if (field.type === "select-one") {
            let parent = field.closest(".custom-select");
            let selectSelected = parent.querySelector(".select-selected");
            let optionItems = parent.querySelectorAll(".select-items > div");

            optionItems?.forEach((element) => {
                element.classList.remove('same-as-selected')
                if (element.getAttribute("data-value") == data[index]) {
                    selectSelected.innerHTML = element.innerHTML;
                    element.classList.add('same-as-selected')
                }
            });
            options = field.querySelectorAll("option");
            options?.forEach((element) => {
                element.removeAttribute('selected')
                if (element.value == data[index]) {
                    element.setAttribute("selected", "");
                }
            });
        }
    }

    function processForMultipleSelect(index, form, multipleSelectFields, data) {
        multipleSelectFields.forEach((multipleSelectField) => {
            if (index === multipleSelectField.name) {
                let wrapper = multipleSelectField.closest('.turn-into-custom-select-js')

                let resetBtn = wrapper?.querySelector('.turn-into-custom-select-reset-btn')

                if(resetBtn){
                    resetBtn.click()
                }

                let options;

                let indexWithoutArray = index.replace("[", "").replace("]", "");

                options = wrapper?.querySelectorAll(".turn-into-custom-select-js-option");

                options?.forEach((option) => {

                    if (data[indexWithoutArray].length) {
                        data[indexWithoutArray].forEach((data) => {
                            if (option.dataset && data == option.dataset.value) {
                                option.click()
                            }
                        });
                    }
                });

                return true;
            }
        });
    }

    function errorHandler(errors, form) {
        form.querySelector('button[type="submit"]')?.classList.remove(
            "cursor-not-allowed",
            "bg-opacity-60"
        );
        if (errors.status === 422) {
            errors.json().then((errorMessages) => {
                let formData = new FormData(form);
                for (let [name] of formData) {
                    if (name === "_token") {
                        continue;
                    }

                    setErrorMessage(form, name);
                    if (name.endsWith("[]")) {
                        let indexWithoutArray = name
                            .replace("[", "")
                            .replace("]", "");
                        if (indexWithoutArray in errorMessages.errors) {
                            setErrorMessage(
                                form,
                                name,
                                errorMessages.errors[indexWithoutArray][0]
                            );
                        }
                    }

                    if (name in errorMessages.errors) {
                        setErrorMessage(
                            form,
                            name,
                            errorMessages.errors[name][0]
                        );
                    }
                }
            });
        } else {
            flashBox("error", errors.statusText);
        }
    }

    let resetErrorMessages = async function resetErrorMessages(form) {
        let formData = new FormData(form);
        for (let [name] of formData) {
            if (name === "_token") {
                continue;
            }

            setErrorMessage(form, name);
        }
    };

    function setErrorMessage(form, name, error = "") {
        let errorField;
        if (name.endsWith("[]")) {
            let multipleSelectFields =
                form.querySelectorAll("select[multiple]");
            if (multipleSelectFields.length) {
                multipleSelectFields.forEach((multipleSelectField) => {
                    if (name === multipleSelectField.name) {
                        errorField =
                            multipleSelectField.parentElement.parentElement.querySelector(
                                ".error-message"
                            );
                    }
                });
            }

            if (errorField !== null) {
                errorField.innerHTML = error;
            }
            return;
        }

        let inputField = form.querySelector(`[name=${name}]`);
        if (inputField !== null) {
            if (inputField.type == "radio") {
                errorField =
                    inputField.parentElement.parentElement.parentElement.querySelector(
                        ".error-message"
                    );
            } else if (
                inputField.type == "date" ||
                inputField.type == "select-one"
            ) {
                errorField =
                    inputField.parentElement.parentElement.querySelector(
                        ".error-message"
                    );
            } else if (inputField.getAttribute("type") == "file") {
                errorField =
                    inputField.parentElement.parentElement.parentElement.parentElement.querySelector(
                        ".error-message"
                    );
            } else {
                errorField =
                    inputField.parentElement.querySelector(".error-message");
            }

            if (errorField !== null) {
                errorField.innerHTML = error;
            }
        }
    }

    window.fetchData = fetchData;
    window.submit = submit;
    window.resetErrorMessages = resetErrorMessages;
}
