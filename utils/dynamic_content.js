$(document).ready(function() {
    const postsPerPage = 5;
    let currentPage = 0;
    let selectedCategory = '';

    function loadMorePosts() {
        $.ajax({
            url: 'api/get_posts.php',
            method: 'GET',
            data: {
                offset: currentPage * postsPerPage,
                limit: postsPerPage,
                category_id: selectedCategory
            },
            success: function(data) {
                const posts = JSON.parse(data);
                if (posts.length > 0) {
                    currentPage++;
                    displayPosts(posts);
                    $('#load-more-btn').show();
                } else {
                    $('#load-more-btn').hide();
                }
            },
            error: function(error) {
                console.error('Error loading posts:', error);
            }
        });
    }

    function displayPosts(posts) {
        const $blogPosts = $('#blog-posts');
        posts.forEach(post => {
            const row = `
                <tr>
                    <td>${post.title}</td>
                    <td>${post.category_name}</td>
                    <td>${post.content}</td>
                </tr>
            `;
            $blogPosts.append(row);
        });
    }

    $('#load-more-btn').on('click', function() {
        loadMorePosts();
    });

    $('#category-dropdown').on('change', function() {
        selectedCategory = $(this).val();
        currentPage = 0;
        $('#blog-posts').empty();
        loadMorePosts();
    });

    loadMorePosts();
});
