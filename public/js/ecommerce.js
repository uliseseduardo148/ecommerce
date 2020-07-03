function generateSlug(slug) {
    // Replaces special characters | symbols with a space
    slug = slug.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    // Cut the spaces at the beginning and end of the sluging
    slug = slug.replace(/^\s+|\s+$/gm, '');
    // Replace the space with a hyphen 
    slug = slug.replace(/\s+/g, '-');
    // Create the URL in the 'slug' text field
    var input = document.getElementById('slug');
    input.value = slug;
}