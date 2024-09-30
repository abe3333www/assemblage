<?php get_header(); ?>

<!-- CONTAINER -->
<main class="top"><!-- 最大幅 -->

  <section id="TOP-MV" class="topMv withMV__trigger">
    <div class="topMv__wrap">
      <video class="topMv__video" src="<?php echo get_template_directory_uri(); ?>/assets/movie/top.mp4" playsinline autoplay muted loop></video>
    </div>
  </section>
  <div class="withMV__inr">
    <section id="TOP-MAGAZINE" class="topMa">
      <h2 class="topMa__ttl comTopTtl ffEn">Magazine</h2>
      <div class="topMa_slide">
        <div class="swiper js-topMaSwiper">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'magazine',
              'posts_per_page' => 6,
            );
            $magazine_query = new WP_Query($args);
            if ($magazine_query->have_posts()) :
              while ($magazine_query->have_posts()) : $magazine_query->the_post();
            ?>
                <div class="swiper-slide">
                  <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                      <div class="slide-image">
                        <?php the_post_thumbnail(); ?>
                        <div class="slide-image-cat">
                          <?php
                          // カスタムタクソノミー "magazine_cat" を取得
                          $categories = get_the_terms(get_the_ID(), 'magazine_cat');
                          if (!empty($categories)) :
                            foreach ($categories as $category) :
                              // カテゴリ名を表示
                              echo '<span class="cat ffEn ' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</span>';
                            endforeach;
                          endif;
                          ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <p class="slide-ttl"><?php the_title(); ?></p>
                    <p class="slide-date"><?php the_time('Y.m.d'); ?></p>
                  </a>
                </div>
              <?php
              endwhile;
              wp_reset_postdata();
            else :
              ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <a class="topMa__btn linkbtn ffEn" href="<?php echo esc_url(home_url()); ?>/magazine/">Read more</a>
    </section>

    <section id="TOP-ABOUT" class="topAb">
      <div class="topAb_cnt cmnSecLeftCnt">
        <div class="topAb_flex">
          <div class="topAb_flex-lft">
            <h2 class="topAb_flex-lft-ttl comTopTtl ffEn"><span>About</span></h2>
            <p class="topAb_flex-lft-txt">Assemblageとは「混ぜ合わせ」を意味するフランス語。<br>ワイン用語では原酒のブレンドを指し、ボルドーなどで行われる伝統技法です。あの複雑な味わいや香りは、異なる原酒の掛け合わせから生まれるのです。<br><br>日本酒においてもこの技法は有効ではないか。小さな閃きは研究と試行錯誤を重ねるにつれ、確信に変わりました。精米歩合や醸造年度など従来の評価基準にとらわれない、純粋な味のみを尺度に構築するアッサンブラージュなら常識を覆す唯一無二の日本酒をお届けできる。<br>それは奇跡的ともいうべき、日本酒の新しい未来の発見でした。</p>
          </div>
          <div class="topAb_flex-rgt">
            <img class="topAb_flex-rgt-treat" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/ab_treat.png">
            <p class="topAb_flex-rgt-img animeBox"><img class="ivo smoothly" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php echo get_template_directory_uri(); ?>/assets/img/top/ab_img.jpg" alt=""></p>
          </div>
        </div>
      </div>
    </section>
    <section id="TOP-PRODUCTS" class="topPr">
      <?php
      $args = array(
        'post_type' => 'products',
        'meta_key' => '_products_materials',
        'posts_per_page' => -1,
      );
      $products_query = new WP_Query($args);
      ?>
      <?php
      if ($products_query->have_posts()) :
        while ($products_query->have_posts()) :
          $products_query->the_post();
          $code = get_post_meta(get_the_ID(), '_products_code', true);
          $jattl = get_post_meta(get_the_ID(), '_products_jattl', true);
          $materials = get_post_meta(get_the_ID(), '_products_materials', true);
          $alcohol = get_post_meta(get_the_ID(), '_products_alcohol', true);
          $contents = get_post_meta(get_the_ID(), '_products_contents', true);
          $save = get_post_meta(get_the_ID(), '_products_save', true);
          $sell = get_post_meta(get_the_ID(), '_products_sell', true);
      ?>
          <div id="TOP-PRODUCTS" class="topPr_cnt cmnSecLeftCnt">
            <h2 class="topPr_cnt-ttl comTopTtl ffEn">Products</h2>
            <div class="topPr_cnt-flex">
              <div class="thumb">
                <p class="animeBox">
                  <img class="ivo smoothly" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php the_post_thumbnail_url(); ?>" alt="料理　画像" width="310" height="453">
                </p>
              </div>
              <div class="tArea">
                <p class="tArea__ttl"><?php the_title(); ?><span><?php echo $code ?></span></p>
                <p class="tArea__ja"><?php echo $jattl ?></p>
                <p class="tArea__txt"><?php the_content(); ?></p>
                <div class="tArea__tbl">
                  <dl>
                    <dt>原材料</dt>
                    <dd><?php echo $materials ?></dd>
                  </dl>
                  <dl>
                    <dt>アルコール度数</dt>
                    <dd><?php echo $alcohol ?></dd>
                  </dl>
                  <dl>
                    <dt>内容量</dt>
                    <dd><?php echo $contents ?></dd>
                  </dl>
                  <dl>
                    <dt>保存方法</dt>
                    <dd><?php echo $save ?></dd>
                  </dl>
                  <dl>
                    <dt>販売</dt>
                    <dd><?php echo $sell ?></dd>
                  </dl>
                </div>
              </div>
            </div>
            <a class="topPr_btn linkbtn ffEn" href="<?php echo esc_url(home_url()); ?>/toc/">商品詳細はこちら</a>
          </div>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </section>
    <section id="TOP-AWARDS" class="topAw">
      <div class="topAw_cnt cmnSecLeftCnt">
        <h2 class="topAw_cnt-ttl">Awards & Biography</h2>
        <div class="topAw_cnt-list">
          <?php
          $args = array(
            'post_type' => 'awards', // 投稿タイプを指定
            'posts_per_page' => -1, // 表示する記事数
          );
          $recipe_query = new WP_Query($args);
          if ($recipe_query->have_posts()) :
            while ($recipe_query->have_posts()) :
              $recipe_query->the_post();
          ?>
              <dl>
                <dt><?php the_time('Y.m.d') ?></dt>
                <dd><?php the_title(); ?></dd>
              </dl>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

      </div>
    </section>
    <section id="TOP-NEWS" class="topNews">
      <div class="cmnSecLeftCnt">
        <h2 class="topNews__ttl comTopTtl ffEn">News</h2>
        <div class="topNews__wrap">
          <div class="topNews__wrap--inr">
            <?php
            $args = array(
              'posts_per_page' => 3,
              'paged' => $paged
            );
            $the_query = new WP_Query($args);
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
              <dl class="topNews__blk">
                <dt class="topNews__blk--date"><time><span class="topNews__blk--date--year"><?php the_time('Y'); ?></span><?php the_time('m.d'); ?></time></dt>
                <dd class="topNews__blk--main">
                  <a class="topNews__blk--main--img" href="<?php the_permalink() ?>">
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail('medium'); ?>
                    <?php else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/news_noimage.png" alt="">
                    <?php endif; ?>
                  </a>
                  <a class="topNews__blk--main--txt" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </dd>
              </dl>
            <?php endwhile; ?>
          </div>
          <a class="topNews__btn linkbtn ffEn" href="<?php echo site_url('news'); ?>">Read more</a>
        </div>
      </div>
    </section>
    <section id="TOP-HISTORY" class="topHis">
      <div class="topHis_cnt cmnSecLeftCnt">
        <h2 class="topHis__ttl comTopTtl ffEn">History</h2>
        <div class="topHis_blks">
          <div class="topHis_blk1">
            <p class="topHis_blk1-txt">この試みに力を与えてくださったのが京都の老舗酒蔵、増田德兵衞商店(月の桂)、北川本家(富翁)、松井酒造(神蔵)。希世のコラボから生まれた第1号｢Assemblage Club 01CODE NAME : Taro｣は、ハイアットリージェンシー京都様をはじめとした数々のホテル・レストランから好評を博しました。さらに飲食店様の料理に合わせたオリジナル日本酒も誕生。<br>海外においてはTaroがシンガポール酒チャレンジ金賞、火入版のTaro’がミラノ酒チャレンジ銀賞を獲得し、新しいトレンドになり得る日本酒アッサンブラージュ。日本酒の新時代をいち早く体感していただけます。</p>
            <div class="topHis_blk1-img">
              <div class="thumb">
                <p class="animeBox"><img class="ivo smoothly" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/his_img1.jpg" alt="History　画像" width="393" height="265"></p>
              </div>
            </div>
          </div>
          <div class="topHis_blk2">
            <div class="topHis_blk2-img">
              <div class="thumb">
                <p class="animeBox"><img class="ivo smoothly" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/his_img2.jpg" alt="History　画像" width="960" height="380"></p>
              </div>
            </div>
            <div class="topHis_blk2-tArea">
              <p class="topHis_blk2-tArea-ttl">月の桂・増田德兵衞氏を<br class="sp">マスターブレンダーに迎えて</p>
              <p class="topHis_blk2-tArea-txt">味わいを最終確認しまとめ上げるマスターブレンダーをつとめるのは、延宝3年(1675)創業の伏見で最も古い酒蔵のひとつ、増田德兵衞商店の十四代・増田德兵衞氏。<br><br>「造りの技術を磨いてきた日本酒業界においてのアッサンブラージュは、ワイン業界のそれとはまた違った意味合いや価値を持つ。さらに蔵を超えたアッサンブラージュは、新たな味の創出が可能になる大事な試みです。まさに無限の入口と出口のある味の世界の始まりに、私たちは今もう一度立っています」</p>
            </div>
          </div>
          <div class="topHis_blk3">
            <div class="topHis_blk3-img">
              <div class="thumb">
                <p class="animeBox">
                  <img class="ivo smoothly pc" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/his_img3.jpg" alt="History　画像" width="960" height="540">
                  <img class="ivo smoothly sp" data-animate="zoomOut" data-delay="0" data-duration="0" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/his_img3_sp.jpg" alt="History　画像" width="364" height="540">
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="TOP-HISTORY" class="topSh">
      <div class="topSh_cnt cmnSecLeftCnt">
        <h2 class="topSh__ttl comTopTtl -ja">取り扱い店舗様</h2>
        <div class="topSh_wrap">
          <ul class="topSh_list">
            <?php
            // カスタムクエリを作成
            $args = array(
              'post_type' => 'shoplist', // カスタム投稿タイプ 'shoplist'
              'posts_per_page' => 5,     // 1ページに表示する記事数
            );
            $shoplist_query = new WP_Query($args); // クエリを作成
            // 記事が存在する場合は表示
            if ($shoplist_query->have_posts()) :
              while ($shoplist_query->have_posts()) : $shoplist_query->the_post();
            ?>
                <li><a href="<?php echo site_url('shoplist'); ?>/#shop-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;
            endif; ?>
          </ul>
          <a class="topSh_btn linkbtn ffEn" href="<?php echo site_url('shoplist'); ?>">Read more</a>
        </div>
      </div>
    </section>
    <section id="TOP-RESTAURANT" class="topRes">
      <div class="topRes_cnt cmnSecLeftCnt">
        <h2>飲食店の方へ</h2>
        <p>「Assemblage Club 01CODE NAME : Taro’」は、独自のアッサンブラージュ技法によって透き通るような甘さと<br>キリッとした辛さという、かつてない複雑な味わいを実現しました。京都の三つの老舗酒蔵が協力し織り成した唯一無二の味わいは、日本酒に造詣の深い方にもご納得いただけるでしょう。<br>さらに貴店オリジナルの日本酒も夢ではありません。<br class="sp">アッサンブラージュならイチから醸造するより<br>短期間で小ロットの制作が可能。甘・酸・旨・苦など味の足し算、そして香りの掛け算によって<br>貴店の看板料理に寄り添う味の設計は自由自在です。貴店だけのプレミアムな日本酒でメニューを彩ってみては。</p>
      </div>
      <div class="topRes_btnArea">
        <a class="linkbtn -wht" href="https://assemblageclub.stores.jp/" target="_blank">飲食店様向け販売ページはこちら</a>
        <a class="linkbtn" href="<?php echo esc_url(home_url());?>/tob/">オリジナル日本酒の制作はこちら</a>
      </div>
    </section>
    <section id="TOP-HISTORY" class="topCol">
      <div class="topCol_cnt cmnSecLeftCnt">
        <h2 class="topCol__ttl comTopTtl ffEn">Collection</h2>
        <?php
        $args = array(
          'post_type' => 'collection',
          'meta_key' => '_collection_code',
          'posts_per_page' => -1,
        );
        $collection_query = new WP_Query($args);
        ?>
        <?php
        if ($collection_query->have_posts()) :
          while ($collection_query->have_posts()) :
            $collection_query->the_post();
            $code = get_post_meta(get_the_ID(), '_collection_code', true);
        ?>
            <div class="topCol_wrap">
              <div class="topCol_cnt-flex">
                <div class="img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/col_img1.jpg" alt="料理画像" class="">
                </div>
                <div class="tArea">
                  <p class="tArea__ttl">
                    <?php the_title();?><span><?php echo $code;?></span>
                  </p>
                  <p class="tArea__txt">
                    <?php the_content();?>
                  </p>
                  <div class="tArea__btn">
                    <div id='product-component-1722991911614'></div>
                    <script type="text/javascript">
                      /*<![CDATA[*/
                      (function() {
                        var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
                        if (window.ShopifyBuy) {
                          if (window.ShopifyBuy.UI) {
                            ShopifyBuyInit();
                          } else {
                            loadScript();
                          }
                        } else {
                          loadScript();
                        }

                        function loadScript() {
                          var script = document.createElement('script');
                          script.async = true;
                          script.src = scriptURL;
                          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
                          script.onload = ShopifyBuyInit;
                        }

                        function ShopifyBuyInit() {
                          var client = ShopifyBuy.buildClient({
                            domain: 'f43f0b-80.myshopify.com',
                            storefrontAccessToken: 'de7496cac0cebbe4d3bedea4bd02458a',
                          });
                          ShopifyBuy.UI.onReady(client).then(function(ui) {
                            ui.createComponent('product', {
                              id: '8520581644510',
                              node: document.getElementById('product-component-1722991911614'),
                              moneyFormat: '%C2%A5%7B%7Bamount_no_decimals%7D%7D',
                              options: {
                                "product": {
                                  "styles": {
                                    "product": {
                                      "@media (min-width: 601px)": {
                                        "max-width": "calc(25% - 20px)",
                                        "margin-left": "20px",
                                        "margin-bottom": "50px"
                                      }
                                    },
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px",
                                      "padding-left": "67px",
                                      "padding-right": "67px",
                                      "width": "100%",
                                      "font-size": "18px",
                                    },
                                    "quantityInput": {
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px"
                                    }
                                  },
                                  "contents": {
                                    "img": false,
                                    "title": false,
                                    "price": false
                                  },
                                  "text": {
                                      "button": getButtonTextBasedOnUrl()
                                  }
                                },
                                "productSet": {
                                  "styles": {
                                    "products": {
                                      "@media (min-width: 601px)": {
                                        "margin-left": "-20px"
                                      }
                                    }
                                  }
                                },
                                "modalProduct": {
                                  "contents": {
                                    "img": false,
                                    "imgWithCarousel": true,
                                    "button": false,
                                    "buttonWithQuantity": true
                                  },
                                  "styles": {
                                    "product": {
                                      "@media (min-width: 601px)": {
                                        "max-width": "100%",
                                        "margin-left": "0px",
                                        "margin-bottom": "0px"
                                      }
                                    },
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px",
                                      "padding-left": "67px",
                                      "padding-right": "67px"
                                    },
                                    "quantityInput": {
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px"
                                    }
                                  },
                                  "text": {
                                    "button": "Add to cart"
                                  }
                                },
                                "option": {},
                                "cart": {
                                  "styles": {
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px"
                                    }
                                  },
                                  "text": {
                                    "title": "買い物かご",
                                    "total": "小計",
                                    "empty": "カートを空にする",
                                    "notice": "",
                                    "button": "購入する"
                                  }
                                },
                                "toggle": {
                                  "styles": {
                                    "toggle": {
                                      "font-family": "Times New Roman, serif",
                                      "background-color": "#000000",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      ":focus": {
                                        "background-color": "#707070"
                                      }
                                    },
                                    "count": {
                                      "font-size": "14px"
                                    }
                                  }
                                }
                              },
                            });
                          });
                        }
                        function getButtonTextBasedOnUrl() {
                          var path = window.location.pathname;
                          if (path.includes('/en/')) {
                            return "Click here to purchase 720ml";
                          } else if (path.includes('/cn/')) {
                            return "点此购入 720ml";
                          } else if (path.includes('/ct/')) {
                            return "點此購入 720ml";
                          } else {
                            return "720ml ご購入はこちら";
                          }
                        }
                      })();
                      /*]]>*/
                    </script>

                    <div id='product-component-1722991814353'></div>
                    <script type="text/javascript">
                      /*<![CDATA[*/
                      (function() {
                        var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
                        if (window.ShopifyBuy) {
                          if (window.ShopifyBuy.UI) {
                            ShopifyBuyInit();
                          } else {
                            loadScript();
                          }
                        } else {
                          loadScript();
                        }

                        function loadScript() {
                          var script = document.createElement('script');
                          script.async = true;
                          script.src = scriptURL;
                          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
                          script.onload = ShopifyBuyInit;
                        }

                        function ShopifyBuyInit() {
                          var client = ShopifyBuy.buildClient({
                            domain: 'f43f0b-80.myshopify.com',
                            storefrontAccessToken: 'de7496cac0cebbe4d3bedea4bd02458a',
                          });
                          ShopifyBuy.UI.onReady(client).then(function(ui) {
                            ui.createComponent('product', {
                              id: '8613730320606',
                              node: document.getElementById('product-component-1722991814353'),
                              moneyFormat: '%C2%A5%7B%7Bamount_no_decimals%7D%7D',
                              options: {
                                "product": {
                                  "styles": {
                                    "product": {
                                      "@media (min-width: 601px)": {
                                        "max-width": "calc(25% - 20px)",
                                        "margin-left": "20px",
                                        "margin-bottom": "50px"
                                      }
                                    },
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px",
                                      "padding-left": "67px",
                                      "padding-right": "67px",
                                      "width": "100%",
                                      "font-size": "18px",
                                    },
                                    "quantityInput": {
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px"
                                    }
                                  },
                                  "contents": {
                                    "img": false,
                                    "title": false,
                                    "price": false
                                  },
                                  "text": {
                                      "button": getButtonTextBasedOnUrl()
                                  }
                                },
                                "productSet": {
                                  "styles": {
                                    "products": {
                                      "@media (min-width: 601px)": {
                                        "margin-left": "-20px"
                                      }
                                    }
                                  }
                                },
                                "modalProduct": {
                                  "contents": {
                                    "img": false,
                                    "imgWithCarousel": true,
                                    "button": false,
                                    "buttonWithQuantity": true
                                  },
                                  "styles": {
                                    "product": {
                                      "@media (min-width: 601px)": {
                                        "max-width": "100%",
                                        "margin-left": "0px",
                                        "margin-bottom": "0px"
                                      }
                                    },
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px",
                                      "padding-left": "67px",
                                      "padding-right": "67px"
                                    },
                                    "quantityInput": {
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px"
                                    }
                                  },
                                  "text": {
                                    "button": "Add to cart"
                                  }
                                },
                                "option": {},
                                "cart": {
                                  "styles": {
                                    "button": {
                                      "font-family": "Times New Roman, serif",
                                      "font-size": "14px",
                                      "padding-top": "15px",
                                      "padding-bottom": "15px",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      "background-color": "#000000",
                                      ":focus": {
                                        "background-color": "#707070"
                                      },
                                      "border-radius": "0px"
                                    }
                                  },
                                  "text": {
                                    "title": "買い物かご",
                                    "total": "小計",
                                    "empty": "カートを空にする",
                                    "notice": "",
                                    "button": "購入する"
                                  }
                                },
                                "toggle": {
                                  "styles": {
                                    "toggle": {
                                      "font-family": "Times New Roman, serif",
                                      "background-color": "#000000",
                                      ":hover": {
                                        "background-color": "#707070"
                                      },
                                      ":focus": {
                                        "background-color": "#707070"
                                      }
                                    },
                                    "count": {
                                      "font-size": "14px"
                                    }
                                  }
                                }
                              },
                            });
                          });
                        }
                        function getButtonTextBasedOnUrl() {
                          var path = window.location.pathname;
                          if (path.includes('/en/')) {
                            return "Click here to purchase 180ml";
                          } else if (path.includes('/cn/')) {
                            return "点此购入 180ml";
                          } else if (path.includes('/ct/')) {
                            return "點此購入 180ml";
                          } else {
                            return "180ml ご購入はこちら";
                          }
                        }
                      })();
                      /*]]>*/
                    </script>
                  </div>
                </div>
              </div>

            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>