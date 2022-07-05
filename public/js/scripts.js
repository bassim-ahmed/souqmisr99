var apex = document.getElementById('apex');

noUiSlider.create(apex, {
    start: [20, 80],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    }
});