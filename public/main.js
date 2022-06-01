window.onload = function() {
    stateSelect = document.getElementById('state').addEventListener('change', stateColorChange);
}

function stateColorChange(event) {
    let target = event.target,
        selectedOption = target.options[target.selectedIndex],
        cercle = document.getElementById('cercle_state');

    let color = selectedOption.dataset.color;

    cercle.style.backgroundColor = color;
}