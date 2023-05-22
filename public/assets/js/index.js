
const Convertor = () => {

    const parent = document.getElementById('convertor');

    if (!parent) return false;

    const input = document.getElementById('input');
    const output = document.getElementById('output');
    const select = document.getElementById('currency');
    const button = document.getElementById('currBtn');

    const show = () => {
        const selectVal = select.options[select.selectedIndex].value;
        const units = select.options[select.selectedIndex].dataset.units;
        output.value = units;
        input.value = selectVal;
    }

    const calc = () => {
        const selectVal = Number(select.options[select.selectedIndex].value);
        const units = Number(select.options[select.selectedIndex].dataset.units);
        const val1 = Number(input.value);
        const result = (1/(selectVal/units))* val1;
        console.log(result)
        output.value = result.toFixed(4);
    }
    select.addEventListener('change', show);
    button.addEventListener('click', calc);
    show();
}

const init = () => {
    Convertor();
}

document.addEventListener("DOMContentLoaded", init);