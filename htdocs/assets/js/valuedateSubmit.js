const $ = document.getElementById.bind(document)

const btnSearch = $('btnSearch')
const dateStart = $('dateStart')
const dateEnd = $('dateEnd')
const people = $('people')
const room = $('room')
const messageErr = $('messageErr')

// Form trigger
const checkin = $('checkin')
const checkout = $('checkout')
const adults = $('adults')
const rooms = $('rooms')
const formTrigger = $('formTrigger')

function getValue() {
    checkin.value = dateStart.value
    checkout.value = dateEnd.value
    adults.value = people.value
    rooms.value = room.value
}

handleSearch = (e) => {
    if(dateStart.value == "" || dateEnd.value == "" || (dateStart.value == "" && dateEnd.value == "") || room.value == "") {
        messageErr.innerText = "Vui lòng chọn đủ ngày check in, ngày check out và số phòng"
        e.preventDefault()
    } else {
        e.preventDefault()
        getValue()
        formTrigger.submit()
    }
    
}

hiddenErr = () => {
    messageErr.innerText = ""
}




btnSearch.addEventListener('click', handleSearch)
dateStart.addEventListener('change', hiddenErr)
dateEnd.addEventListener('change', hiddenErr)
room.addEventListener('click', hiddenErr)
