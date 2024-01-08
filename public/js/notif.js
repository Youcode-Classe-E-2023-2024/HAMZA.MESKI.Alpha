const notifId = document.getElementById('notif-id'); 
const notifContent = document.getElementById('notif-content');
const notContent = document.getElementById('not-content');
const markRead = document.getElementById('mark-read');
const notifNumber = document.getElementById('notif-number');

fetch(URLROOT + '/dashboard/selectMarkRead')
    .then(res => res.json())
    .then(data => {
        console.log(data)
        let html = ''; 
        for(let i = 0; i < data.length; i++) {
            html += `
                <strong>* ${data[i].adder_name} add a product</strong><br>
            `;
        }
        notContent.innerHTML = html;
        console.log(data.length)
        notifNumber.textContent = data.length;

        // markRead
        markRead.addEventListener('click', function() {
            const formData = new FormData(); 
            formData.append('notifications', JSON.stringify(data))
            fetch(URLROOT + '/dashboard/markRead', {
                method: 'POST', 
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                console.log(data);
                fetch(URLROOT + '/dashboard/selectMarkRead', {
                    method: 'POST', 
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    let html = ''; 
                    for(let i = 0; i < data.length; i++) {
                        html += `
                            <strong>* ${data[i].adder_name} add a product</strong><br>
                        `;
                    }
                    notContent.innerHTML = html;
                    console.log(data.length)
                    notifNumber.textContent = data.length;
                })
            })
        })
    });

notifId.addEventListener('click', function() {
    notifContent.classList.toggle('Hidden');
})
