
const $ = document.getElementById.bind(document)

const btnPrint = $('btnPrint')
const btnPay = $('btnPay')
const idroom = $('idroom')
const roomname = $('roomname')
const totals = $('totals')
const pushRoom = $('pushRoom')
const nameUS = $('nameUS')
const phoneUS = $('phoneUS')
const qr_code = $('qr_code')
const closes = $('close')




handlePrint = () => {
    window.print()
}

function handleUpDb(id, name, tc) {
    idroom.value = id
    roomname.value = name
    totals.value = tc
    if(nameUS.value == "" || phoneUS.value == "") {
        alert("Vui lòng nhập họ tên và số điện thoại")
        pushRoom.preventDefault();
    } else {
        qr_code.style.display = "block"
        closes.style.display = "block"
    }
}

const handleExit = () => {
    qr_code.style.display = "none"
    pushRoom.submit()
}

btnPrint.addEventListener('click', handlePrint)
closes.addEventListener('click',handleExit)
// btnPay.addEventListener('click',handleUpDb)
