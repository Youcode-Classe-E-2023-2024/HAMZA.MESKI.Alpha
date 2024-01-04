/* constants */
const URLROOT = 'http://localhost/HAMZA.MESKI.Alpha';

/* functions */ 
function deletePost(id){
    fetch('https://jsonplaceholder.typicode.com/posts/' + id, {
        method: 'DELETE', 
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(res => {
        if(res.status == 200) {
            console.log(res.status);
            console.log(`post with id ${id} deleted successfully`);
        }
    })
}

// home controller
const home = document.getElementById('home'); 
if(home){
    fetch('https://jsonplaceholder.typicode.com/posts')
    .then(res => res.json())
    .then(data => {
        let html = '';
        for(let i = 0; i < data.length; i++){
            html += `
                <!-- component -->
                <div class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <span class="font-light text-gray-600">mar 10, 2019</span>
                        <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500" href="#">${data[i].id}</a>
                    </div>
                    <div class="mt-2">
                        <h1 class="text-2xl text-gray-700 font-bold hover:text-gray-600">${data[i].title}</h1>
                        <p class="mt-2 text-gray-600">${data[i].body}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <a class="text-blue-600 hover:underline" href="#">Read more</a>
                        <div>
                            <a class="flex items-center" href="#">
                                <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80" alt="avatar">
                                <h1 class="text-gray-700 font-bold">Khatab wedaa</h1>
                            </a>
                        </div>
                    </div>
                </div>
            `;
        }
        home.innerHTML = html;
    })
}

// dashboard controller 
const dashboard_index = document.getElementById('dashboard_index'); 
if(dashboard_index){
    // detecting numbers of users and posts on the plateform
    const users_number = document.getElementById('users_number');
    const posts_number = document.getElementById('posts_number');

    fetch('https://jsonplaceholder.typicode.com/posts')
    .then(res => res.json())
    .then(data => posts_number.textContent = data.length);

    fetch('https://jsonplaceholder.typicode.com/users')
    .then(res => res.json())
    .then(data => users_number.textContent = data.length);

    // 
}

// managePost controller 
const managePosts_index = document.getElementById('managePosts_index');
if(managePosts_index){
    $(document).ready(function(){
        // Initialize DataTable
        $('#postsTable').DataTable({
            "ajax": {
                "url": "https://jsonplaceholder.typicode.com/posts",
                "dataSrc": "",
                // "data": formData,
                "type": 'GET',
            },
            "columns": [
                {"data": "id"},
                {"data": "userId"},
                {"data": "title"},
                {"data": "body"},
                {
                    data: 'id',
                    render: function(data) {
                        return `<button onclick="deletePost(${data})" name="btn" class="text-red-500 hover:underline mr-2">delete</button>` +
                            `<a href="${URLROOT}/ManagePosts/editPost/${data}" class="delete_btn text-blue-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">edit</a>`;
                    }
                }
            ]
        }); 
    });

}

// const add_post_form = document.getElementById('add_post_form'); 
// const title_input = document.getElementById('title_input');
// const body_input = document.getElementById('body_input'); 

// add_post_form.addEventListener('submit', function(event) {
//     event.preventDefault(); 
    
//     if(title_input.value.trim().length != 0 && body_input.value.trim().length != 0){
        
//     }
// })

// posts multiple adding
