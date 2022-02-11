// Script pentru plata cu Strip
var stripe = Stripe("pk_test_51KS6hlG9xVZzyAjOtfNO6rrxVWxtsewwhfv53YrEvhIezTHeYwJpdG7IIe53dUU9iIl9cZdkmD7F8ZuoaDZM4ABn006S66ilK9")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
  fetch('/checkout.php', {
    method:"POST",
    headers:{
      'Content-Type' : 'application/json',
    },
    body: JSON.stringify({})
  }).then(res => res.json())
  .then(payload =>{
    stripe.redirectToCheckout({sessionId:payload.id})
  })
})