@props(['type' => 'index', 'show' => false, 'description' => false, 'keywords' => false])


@if ($show)
    @if ($description)
        <meta name="description"
            content="Learn about the numerous benefits of meditation for reducing stress and improving overall well-being. Read our expert insights on this ancient practice.">
    @endif
    @if ($keywords)
        <meta name="keywords" content="meditation, stress management, well-being, benefits">
    @endif
    @if ($type == 'index')
    @elseif($type == 'blog')
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BlogPosting",
            "headline": "The Benefits of Meditation for Stress Management",
            "image": [
                "https://www.example.com/images/meditation.jpg"
            ],
            "author": {
                "@type": "Person",
                "name": "John Doe"
            },
            "publisher": {
            "@type": "Organization",
            "name": "My Blog",
            "logo": {
                "@type": "ImageObject",
                "url": "https://www.example.com/images/logo.png"
            }
            },
                "datePublished": "2022-01-01T12:00:00+00:00",
                "dateModified": "2022-01-02T12:00:00+00:00",
                "description": "Learn about the numerous benefits of meditation for reducing stress and improving overall well-being. Read our expert insights on this ancient practice.",
                "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://www.example.com/meditation-for-stress-management"
            }
        }
        </script>
    @elseif ($type == 'product')
        <meta name="description"
            content="Buy the latest [product name] at [website name]. [Brief product description]. Available in [colors/sizes].">
        <meta name="keywords" content="[product name], [category], [brand], [website name]">

        <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "Product",
            "name": "[product name]",
            "image": "[product image URL]",
            "description": "[product description]",
            "brand": {
                "@type": "Thing",
                "name": "[brand name]"
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "[average rating]",
                "reviewCount": "[number of reviews]"
            },
            "offers": {
                "@type": "Offer",
                "priceCurrency": "[currency]",
                "price": "[price]",
                "itemCondition": "http://schema.org/NewCondition",
                "availability": "http://schema.org/InStock",
                "seller": {
                    "@type": "Organization",
                    "name": "[website name]"
                }
            }
        }
        </script>
    @elseif ($type == 'article')
        <meta name="description"
            content="[Brief summary of the article]. Read the latest [article title] on [website name].">
        <meta name="keywords" content="[article title], [category], [website name], [related keywords]">
        <script type="application/ld+json">
            {
              "@context": "http://schema.org/",
              "@type": "Article",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "[article URL]"
              },
              "headline": "[article title]",
              "image": [
                "[article featured image URL]"
              ],
              "datePublished": "[article publish date]",
              "dateModified": "[article last modification date]",
              "author": {
                "@type": "Person",
                "name": "[author name]"
              },
              "publisher": {
                "@type": "Organization",
                "name": "[website name]",
                "logo": {
                  "@type": "ImageObject",
                  "url": "[website logo URL]"
                }
              },
              "description": "[Brief summary of the article]",
              "articleBody": "[article body content]"
            }
            </script>

        <script type="application/ld+json">
                {
                  "@context": "http://schema.org/",
                  "@type": "NewsArticle",
                  "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": "[article URL]"
                  },
                  "headline": "[article title]",
                  "image": [
                    "[article featured image URL]"
                  ],
                  "datePublished": "[article publish date]",
                  "dateModified": "[article last modification date]",
                  "author": {
                    "@type": "Person",
                    "name": "[author name]"
                  },
                  "publisher": {
                    "@type": "Organization",
                    "name": "[website name]",
                    "logo": {
                      "@type": "ImageObject",
                      "url": "[website logo URL]"
                    }
                  },
                  "description": "[Brief summary of the article]"
                }
            </script>
    @elseif($type == 'turms')
        <meta name="description"
            content="[Website name] Terms and Conditions page. Read our terms and conditions for [Website name] services.">
        <meta name="keywords" content="terms and conditions, [Website name], services, policies">
        <script type="application/ld+json">
            {
              "@context": "http://schema.org/",
              "@type": "WebPage",
              "url": "[Terms and Conditions page URL]",
              "name": "[Website name] Terms and Conditions",
              "description": "[Website name] Terms and Conditions page. Read our terms and conditions for [Website name] services."
            }
        </script>
    @elseif($type == 'page')
        <meta name="description"
            content="[Brief description of the page]. Read more on [page title] page on [website name].">
        <meta name="keywords" content="[page title], [category], [website name], [related keywords]">
        <script type="application/ld+json">
            {
              "@context": "http://schema.org/",
              "@type": "WebPage",
              "url": "[page URL]",
              "name": "[page title]",
              "description": "[Brief description of the page]."
            }
            </script>
    @endif


@endif
