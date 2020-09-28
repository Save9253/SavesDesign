<?php
    $page = "Shop";
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';
    $HeaderLogo = 'yes';

    include_once './parts/header.php';
?>
<div>
    <h1>Shop</h1>
    <p>Enjoy clear prices! All taxes are already included</p>
</div>
<section aria-label="Packages">
    <h2>Packages</h2>
    <p>Get a 10% discount bying a package!</p>
    <div aria-label="Packages" id="packages">
        <div aria-label="Extra Small Package" class="package">
            <h3>Extra Small Package</h3>
            <svg role="img" aria-label="Extra Small Package" width="203" viewBox="0 0 203 153" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g fill="white" stroke="var(--dr)" stroke-width="2" stroke-linejoin="round">
                    <path d="M201.2 1H1.2V31H201.2V1Z"/>
                    <path d="M201.2 31H1.2V151H201.2V31Z"/>
                </g>
                <path fill="var(--md)" d="M23.9 21.4L21.4 23.1L18.5 23.7L15.6 23.1L13.1 21.4L11.5 19L10.9 16L11.5 13.1L13.1 10.6L15.6 9L18.5 8.4L21.4 9L23.9 10.6L25.6 13.1L26.2 16L25.6 19L23.9 21.4Z" />
                <g fill="var(--ac)">
                    <path id="CrlXS" d="M190.2 18.4L189.1 19.2L187.8 19.4L186.5 19.2L185.4 18.4L184.6 17.3L184.4 16L184.6 14.7L185.4 13.6L186.5 12.9L187.8 12.7L189.1 12.9L190.2 13.6L190.9 14.7L191.2 16L190.9 17.3L190.2 18.4Z"/>
                    <use href="#CrlXS" transform="translate(-10)"/>
                    <use href="#CrlXS" transform="translate(-20)"/>
                </g>
                <g fill="var(--md50)">
                    <path id="RecXS" d="M80.4 13.5H58.6V18.5H80.4V13.5Z"/>
                    <use href="#RecXS" transform="translate(26)"/>
                    <use href="#RecXS" transform="translate(52)"/>
                </g>
                <g fill="var(--dr)">
                    <path d="M81.1 90.6L96.6 123.7H84.2L74.3 99.6H73.7L63.5 123.7H51.1L66.2 90.6L51.1 58.4H63.5L73.7 79.2H74.3L84.2 58.4H96.6L81.1 90.6Z"/>
                    <path d="M132.3 83.2C135 83.2 137.5 83.7 139.8 84.8C142.2 85.8 144.2 87.2 145.9 89.1C147.6 90.9 148.9 93 149.8 95.6C150.8 98.1 151.2 100.9 151.2 103.9C151.2 106.7 150.8 109.3 149.9 111.7C149.1 114.2 147.8 116.3 146.2 118.1C144.6 119.8 142.8 121.2 140.6 122.2C138.4 123.2 136 123.7 133.3 123.7H103.5V111.6H129.8C131.1 111.6 132.3 111.5 133.5 111.2C134.7 110.8 135.7 110.4 136.5 109.7C137.4 109.1 138.1 108.3 138.6 107.3C139.1 106.4 139.3 105.2 139.3 103.9C139.3 101.4 138.5 99.4 136.8 98C135.2 96.6 133.2 95.9 130.8 95.9H123C119.7 95.9 116.8 95.5 114.1 94.8C111.4 94.1 109.1 93 107.3 91.5C105.4 89.9 104 88 102.9 85.5C101.9 83.1 101.4 80.2 101.4 76.8C101.4 74.4 101.8 72.1 102.7 69.9C103.5 67.6 104.6 65.7 106.1 64C107.6 62.3 109.4 60.9 111.5 59.9C113.6 58.9 115.9 58.4 118.5 58.4H145.5V71.1H123.5C122.2 71.1 121 71.2 119.9 71.4C118.9 71.5 117.9 71.8 117.1 72.3C116.2 72.7 115.6 73.3 115.1 74.1C114.7 74.9 114.5 76.1 114.5 77.5C114.5 79.1 115 80.4 116.1 81.6C117.2 82.7 118.7 83.2 120.5 83.2H132.3Z"/>
                </g>
            </svg>
            <hr>
            <div aria-label="Description" class="description">
                <p>This is a one-page website. Works well to familiarize visitors with you and your business.</p>
                <ul><span>Includes:</span>
                    <li>Server Set Up</li>
                    <li>Style Development</li>
                    <li>Header</li>
                    <li>Footer</li>
                    <li>Home Page</li>
                    <li>Single Page Navigation</li>
                </ul>
            </div>
            <hr>
            <div aria-label="price" class="price">
                <span aria-label="Old Price" class="oldPrice">$350</span>
                <span aria-label="New Price" class="newPrice">$315</span>
                <span aria-label="Discount" class="discount">-10%</span>
            </div>
            <button aria-label="Add to Cart Extra Small Package" type="submit" class="addTCart">Add to Cart</button>
        </div>
        <div aria-label="Small Package" class="package">
            <h3>Small Package</h3>
            <svg role="img" aria-label="Small Package" width="220" height="172" viewBox="0 0 220 172" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#topS" transform="translate(18,-20)"/>
                <path opacity="0.8" d="M206.7 15.3H17.7V152.7H206.7V15.3Z" fill="var(--md)"/>
                <g id="topS">
                    <g fill="white" stroke="var(--dr)" stroke-width="2" stroke-linejoin="round">
                        <path d="M201.7 20H1.7V50H201.7V20Z"/>
                        <path d="M201.7 50H1.7V170H201.7V50Z"/>
                    </g>
                    <path d="M24.4 40.4L21.9 42.1L19 42.7L16.1 42.1L13.6 40.4L12 38L11.4 35L12 32.1L13.6 29.6L16.1 28L19 27.4L21.9 28L24.4 29.6L26.1 32.1L26.7 35L26.1 38L24.4 40.4Z" fill="var(--md)"/>
                    <g fill="var(--ac)">
                        <path id="crlS" d="M190.7 37.4L189.6 38.2L188.3 38.4L187 38.2L185.9 37.4L185.1 36.3L184.9 35L185.1 33.7L185.9 32.6L187 31.9L188.3 31.7L189.6 31.9L190.7 32.6L191.4 33.7L191.7 35L191.4 36.3L190.7 37.4Z"/>
                        <use href="#crlS" transform="translate(-10)"/>
                        <use href="#crlS" transform="translate(-20)"/>
                    </g>
                    <g fill="var(--md50)">
                        <path id="recS" d="M80.9 32.5H59.1V37.5H80.9V32.5Z"/>
                        <use href="#recS" transform="translate(26)"/>
                        <use href="#recS" transform="translate(52)"/>
                    </g>
                </g>
                <path d="M107.7 102.2C110.4 102.2 112.9 102.7 115.2 103.8C117.5 104.8 119.6 106.2 121.2 108.1C123 109.9 124.3 112 125.2 114.6C126.1 117.1 126.6 119.9 126.6 122.9C126.6 125.7 126.2 128.3 125.3 130.7C124.4 133.2 123.2 135.3 121.6 137.1C120 138.8 118.1 140.2 115.9 141.2C113.8 142.2 111.3 142.7 108.7 142.7H78.9V130.6H105.2C106.5 130.6 107.7 130.5 108.8 130.2C110.1 129.8 111.1 129.4 111.9 128.7C112.7 128.1 113.4 127.3 113.9 126.3C114.4 125.4 114.7 124.2 114.7 122.9C114.7 120.4 113.9 118.4 112.2 117C110.6 115.6 108.6 114.9 106.2 114.9H98.4C95.1 114.9 92.1 114.5 89.5 113.8C86.8 113.1 84.5 112 82.6 110.5C80.8 108.9 79.3 107 78.3 104.5C77.3 102.1 76.8 99.2 76.8 95.8C76.8 93.4 77.2 91.1 78 88.9C78.9 86.6 80 84.7 81.5 83C83 81.3 84.7 79.9 86.9 78.9C89 77.9 91.3 77.4 93.9 77.4H120.8V90.1H98.9C97.6 90.1 96.4 90.2 95.3 90.4C94.2 90.5 93.3 90.8 92.4 91.3C91.6 91.7 91 92.3 90.5 93.1C90.1 93.9 89.8 95.1 89.8 96.5C89.8 98.1 90.4 99.4 91.5 100.6C92.6 101.7 94 102.2 95.9 102.2H107.7Z" fill="var(--dr)"/>
            </svg>
            <hr>
            <div aria-label="Description" class="description">
                <p>This is a one-page website. Works well to familiarize visitors with you and your business.</p>
                <ul><span>Includes:</span>
                    <li>Server Set Up</li>
                    <li>Style Development</li>
                    <li>Header</li>
                    <li>Footer</li>
                    <li>Home Page</li>
                    <li>About Page</li>
                    <li>Services Page</li>
                    <li>Contact Page</li>
                    <li>Contact Form</li>
                </ul>
            </div>
            <hr>
            <div aria-label="price" class="price">
                <span aria-label="Old Price" class="oldPrice">$550</span>
                <span aria-label="New Price" class="newPrice">$495</span>
                <span aria-label="Discount" class="discount">-10%</span>
            </div>
            <button type="submit" class="addTCart">Add to Cart</button>
        </div>
        <div aria-label="Extra Small Package" class="package">
            <h3>Medium Package</h3>
            <svg role="img" aria-label="Medium Package" width="238" height="191" viewBox="0 0 238 191" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g fill="white" stroke="var(--dr)" stroke-width="2" stroke-linejoin="round">
                    <path d="M201.6 40H1.6V70H201.6V40Z"/>
                    <path d="M201.6 70H1.6V190H201.6V70Z"/>
                </g>
                <path d="M24.3 60.4L21.9 62L18.9 62.6L16 62L13.5 60.4L11.9 57.9L11.3 55L11.9 52L13.5 49.6L16 47.9L18.9 47.3L21.9 47.9L24.3 49.6L26 52L26.6 55L26 57.9L24.3 60.4Z" fill="var(--md)"/>
                <use href="#topM" transform="translate(-18,20)"/>
                <use href="#topM" transform="translate(18,-20)"/>
                <g opacity="0.8" fill="var(--md)">
                    <path d="M202.6 39H12.6V177H202.6V39Z"/>
                    <path d="M224.6 15.9H35.1V152.6H224.6V15.9Z"/>
                </g>
                <g id="topM">
                    <g fill="white" stroke="var(--dr)" stroke-width="2" stroke-linejoin="round">
                        <path d="M219.6 20.6H19.6V50.6H219.6V20.6Z"/>
                        <path d="M219.6 50.6H19.6V170.6H219.6V50.6Z"/>
                    </g>
                    <path d="M42.3 41L39.9 42.6L36.9 43.2L34 42.6L31.5 41L29.9 38.5L29.3 35.6L29.9 32.7L31.5 30.2L34 28.5L36.9 27.9L39.9 28.5L42.3 30.2L44 32.7L44.6 35.6L44 38.5L42.3 41Z" fill="var(--md)"/>
                    <g fill="var(--ac)">
                        <path id="crlM" d="M208.6 38L207.5 38.7L206.2 39L204.9 38.7L203.8 38L203.1 36.9L202.8 35.6L203.1 34.3L203.8 33.2L204.9 32.4L206.2 32.2L207.5 32.4L208.6 33.2L209.3 34.3L209.6 35.6L209.3 36.9L208.6 38Z" />
                        <use href="#crlM" transform="translate(-10)"/>
                        <use href="#crlM" transform="translate(-20)"/>
                    </g>
                    <g fill="var(--md50)">
                        <path id="recM" d="M98.8 33.1H77.1V38.1H98.8V33.1Z" />
                        <use href="#recM" transform="translate(26)"/>
                        <use href="#recM" transform="translate(52)"/>
                    </g>
                <g>
                <path d="M120.7 125.1H121.4L126.6 101.6C128.4 93.7 130.1 85.9 131.8 78H145.6V143.3H136.2V100.8H135.6L126.1 143.3L115.6 143.4L106.7 100.9H106V143.3H96.5V78H110.2L120.7 125.1Z" fill="var(--dr)"/>
            </svg>
            <hr>
            <div aria-label="Description" class="description">
                <p>This is a one-page website. Works well to familiarize visitors with you and your business.</p>
                <ul><span>Includes:</span>
                    <li>Server Set Up</li>
                    <li>Style Development</li>
                    <li>Header</li>
                    <li>Footer</li>
                    <li>Home Page</li>
                    <li>About Page</li>
                    <li>Services Page</li>
                    <li>Contact Page</li>
                    <li>Contact Form</li>
                </ul>
            </div>
            <hr>
            <div aria-label="price" class="price">
                <span aria-label="Old Price" class="oldPrice">$750</span>
                <span aria-label="New Price" class="newPrice">$675</span>
                <span aria-label="Discount" class="discount">-10%</span>
            </div>
            <button type="submit" class="addTCart">Add to Cart</button>

        </div>
        <div aria-label="Extra Small Package" class="package">
            <h3>Large Package</h3>
            <svg role="img" aria-label="Large Package" width="272" height="229" viewBox="0 0 272 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#topL" transform="translate(-36,40)"/>
                <use href="#topL" transform="translate(36,-40)"/>
                <g opacity="0.8" fill="var(--md)">
                    <use href="#shadowL" transform="translate(18,-20)"/>
                    <use href="#shadowL" transform="translate(-40,46)"/>
                </g>
                <use href="#topL" transform="translate(-18,20)"/>
                <use href="#topL" transform="translate(18,-20)"/>
                <g opacity="0.8" fill="var(--md)">
                    <path id="shadowL"d="M241.3 33.3H52.3V170.7H241.3V33.3Z"/>
                    <use href="#shadowL" transform="translate(-22,23)"/>
                </g>
                <g id="topL">
                    <g  fill="white" stroke="var(--dr)" stroke-width="2" stroke-linejoin="round">
                        <path d="M236.3 38H36.3V68H236.3V38Z"/>
                        <path d="M236.3 68H36.3V188H236.3V68Z"/>
                    </g>
                    <path d="M59.1 58.4L56.6 60.1L53.7 60.7L50.8 60.1L48.3 58.4L46.6 56L46 53L46.6 50.1L48.3 47.6L50.8 46L53.7 45.4L56.6 46L59.1 47.6L60.7 50.1L61.3 53L60.7 56L59.1 58.4Z" fill="var(--md)"/>
                    <g  fill="var(--ac)">
                        <path id="crlL" d="M225.3 55.4L224.2 56.2L222.9 56.4L221.6 56.2L220.5 55.4L219.8 54.3L219.5 53L219.8 51.7L220.5 50.6L221.6 49.9L222.9 49.7L224.2 49.9L225.3 50.6L226.1 51.7L226.3 53L226.1 54.3L225.3 55.4Z"/>
                        <use href="#crlL" transform="translate(-10)"/>
                        <use href="#crlL" transform="translate(-20)"/>
                    </g>
                    <g fill="var(--md50)">
                        <path id="recL" d="M115.6 50.5H93.8V55.5H115.6V50.5Z"/>
                        <use href="#recL" transform="translate(26)"/>
                        <use href="#recL" transform="translate(52)"/>
                    </g>
                </g>
                <path d="M123.2 149.7H158.7V160.7H111.7V95.4H123.2V149.7Z" fill="var(--dr)"/>
            </svg>
            <hr>
            <div aria-label="Description" class="description">
                <p>This is a one-page website. Works well to familiarize visitors with you and your business.</p>
                <ul><span>Includes:</span>
                    <li>Server Set Up</li>
                    <li>Style Development</li>
                    <li>Header</li>
                    <li>Footer</li>
                    <li>Home Page</li>
                    <li>About Page</li>
                    <li>Services Page</li>
                    <li>Contact Page</li>
                    <li>Contact Form</li>
                </ul>
            </div>
            <hr>
            <div aria-label="price" class="price">
                <span aria-label="Old Price" class="oldPrice">$1050</span>
                <span aria-label="New Price" class="newPrice">$945</span>
                <span aria-label="Discount" class="discount">-10%</span>
            </div>
            <button type="submit" class="addTCart">Add to Cart</button>

        </div>
    </div>
</section>
<section aria-label="All Services">
    <h2>All the services</h2>
    <p>Pay only for what you need</p>
</section>
<?php include_once './parts/footer.php';?>
