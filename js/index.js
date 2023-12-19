paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '32.66'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            var paymentDetails = {
                paymentID: data.orderID,
                payerID: data.payerID,
                payment_status: details.status,
                currency_code: details.purchase_units[0].amount.currency_code,
                value: details.purchase_units[0].amount.value,
                payer_given_name: details.payer.name.given_name,
                payer_surname: details.payer.name.surname,
                payer_email: details.payer.email_address
            };

            console.log(paymentDetails);

            // Make an AJAX request to save payment details in the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_payment.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };

            xhr.send(JSON.stringify(paymentDetails));

            // // Redirect to the success page
            // window.location.replace("booking-success.php");
        });
    },
    onCancel: function (data) {
        window.location.replace("http://localhost:63342/tutorial/paypal/Oncancel.php");
    }
}).render('#paypal-payment-button');
