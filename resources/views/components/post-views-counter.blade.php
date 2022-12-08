@props(['post'])

<p class="mt-4 block text-gray-400 text-xs">
  <?php
      $cookiePostsViewed = 'cookiePostsViewed';
      $suffix = ($post->views_count + 1 == 1) ? ' view' : ' views';

      if (!isset($_COOKIE[$cookiePostsViewed])) {
          setcookie($cookiePostsViewed, $post->id);
          $post->incrementViewsCount();
          echo $post->views_count + 1, $suffix;

          return;
      }

      if (strchr($_COOKIE[$cookiePostsViewed], $post->id)) {
          echo $post->views_count, $suffix;

          return;
      }

      setcookie($cookiePostsViewed, $_COOKIE[$cookiePostsViewed] . "-$post->id");
      $post->incrementViewsCount();
      echo $post->views_count + 1, $suffix;
  ?>
</p>
