<?php

// @formatter:off

    /**
     * A helper file for your Eloquent Models
     * Copy the phpDocs from this file to the correct Model,
     * And remove them from this file, to prevent double declarations.
     *
     * @author Barry vd. Heuvel <barryvdh@gmail.com>
     */


    namespace App\Models {
        /**
         * App\Models\Category
         *
         * @property int $id
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         * @property string $title
         * @property string $slug
         * @property string|null $seo_title
         * @property string|null $description
         * @property string|null $seo_description
         * @property int $language_id
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
         * @property-read int|null $posts_count
         * @method static \Database\Factories\CategoryFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Category query()
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereLanguageId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereSeoDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereSeoTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
         */
        class Category extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\Language
         *
         * @property int $id
         * @property string $language_code
         * @property int $active
         * @method static \Database\Factories\LanguageFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Language query()
         * @method static \Illuminate\Database\Eloquent\Builder|Language whereActive($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Language whereLanguageCode($value)
         */
        class Language extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\PostService
         *
         * @property int $id
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         * @property string $status
         * @property int $trashed
         * @property string $title
         * @property string $slug
         * @property int $featured_image
         * @property int $language_id
         * @property int $cornerstone_content
         * @property string $description
         * @property string $content
         * @property string|null $seo_title
         * @property string|null $seo_description
         * @property int $category_id
         * @property int $user_id
         * @property-read \App\Models\Category $category
         * @property-read \App\Models\Upload $featuredImage
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
         * @property-read int|null $tags_count
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upload[] $uploads
         * @property-read int|null $uploads_count
         * @property-read \App\Models\User $user
         * @method static \Database\Factories\PostFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Post query()
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereCornerstoneContent($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereFeaturedImage($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereLanguageId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereSeoTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereTrashed($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
         */
        class Post extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\PostTag
         *
         * @property int $post_id
         * @property int $tag_id
         * @method static \Illuminate\Database\Eloquent\Builder|PostTag newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|PostTag newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|PostTag query()
         * @method static \Illuminate\Database\Eloquent\Builder|PostTag wherePostId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereTagId($value)
         */
        class PostTag extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\PostUpload
         *
         * @property int $post_id
         * @property int $upload_id
         * @method static \Illuminate\Database\Eloquent\Builder|PostUpload newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|PostUpload newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|PostUpload query()
         * @method static \Illuminate\Database\Eloquent\Builder|PostUpload wherePostId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|PostUpload whereUploadId($value)
         */
        class PostUpload extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\Tag
         *
         * @property int $id
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         * @property string $title
         * @property string $slug
         * @property string|null $seo_title
         * @property string|null $description
         * @property string|null $seo_description
         * @property int $language_id
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
         * @property-read int|null $posts_count
         * @method static \Database\Factories\TagFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLanguageId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSeoDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSeoTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
         */
        class Tag extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\Upload
         *
         * @property int $id
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         * @property string $name
         * @property string $slug
         * @property string|null $title
         * @property string|null $alt
         * @property string|null $description
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
         * @property-read int|null $posts_count
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $postsWhereCover
         * @property-read int|null $posts_where_cover_count
         * @method static \Database\Factories\UploadFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereAlt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDescription($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereSlug($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereTitle($value)
         * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
         */
        class Upload extends \Eloquent
        {
        }
    }

    namespace App\Models {
        /**
         * App\Models\User
         *
         * @property int $id
         * @property string $first_name
         * @property string $last_name
         * @property string $email
         * @property \Illuminate\Support\Carbon|null $email_verified_at
         * @property string $password
         * @property string|null $remember_token
         * @property \Illuminate\Support\Carbon|null $created_at
         * @property \Illuminate\Support\Carbon|null $updated_at
         * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
         * @property-read int|null $notifications_count
         * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
         * @property-read int|null $posts_count
         * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
         * @property-read int|null $tokens_count
         * @method static \Database\Factories\UserFactory factory(...$parameters)
         * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
         * @method static \Illuminate\Database\Eloquent\Builder|User query()
         * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
         * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
         */
        class User extends \Eloquent
        {
        }
    }

