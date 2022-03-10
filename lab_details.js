let btnAdd = document.querySelector('button');
let table = document.querySelector('table');


let labInput = document.querySelector('#lab');
let systemInput = document.querySelector('#system');
let configInput = document.querySelector('#config');


btnAdd.addEventListener('click', () => {
    let lab = labInput.value;
    let system = systemInput.value;
    let config = configInput.value;

    let template = `
                <tr>
                    <td>${lab}</td>
                    <td>${system}</td>
                    <td>${config}</td>
                </tr>`;

    table.innerHTML += template;
});
