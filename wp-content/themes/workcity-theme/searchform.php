<form role="search" method="get" class="search-form" action="<?php echo home_url(
    '/'
); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x(
            'Search for:',
            'label',
            'workcity-theme'
        ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x(
            'Search …',
            'placeholder',
            'workcity-theme'
        ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php echo _x(
            'Search',
            'submit button',
            'workcity-theme'
        ); ?></span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</form> 