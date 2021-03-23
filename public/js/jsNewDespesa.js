const masks = {
    float (value) {
        return value
        .replace(/\D/g, '')
        .replace(/(\d{2})(\d))/,'$1.$2')
    }
}
document.querySelectorAll('input').forEach(($input) => {
    const field = $input.dataset.js
})