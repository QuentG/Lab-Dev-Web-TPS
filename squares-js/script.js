function getRandomColor () {
    const letters = '0123456789ABCDEF'
    let color = '#'

    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)]
    }

    return color
}

const add = document.getElementById('add')

add.addEventListener('click', () => {
    for (let i = 0; i < 4; i++) {
        const div = document.createElement('div')
        div.className = 'square'
        div.style.backgroundColor = getRandomColor()
        document.body.appendChild(div)
    }
})

const random = document.getElementById('random')

random.addEventListener('click', () => {
    document.querySelectorAll('.square').forEach(square => {
        square.style.backgroundColor = getRandomColor()
    })
})

const remove = document.getElementById('remove')

remove.addEventListener('click', () => {
    document.querySelectorAll('.square').forEach(square => {
        square.remove()
    })
})