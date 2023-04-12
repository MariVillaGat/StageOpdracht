<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Reward_System_App_0"></a>Reward System App</h1>
<p class="has-line-data" data-line-start="2" data-line-end="3">This is a web application built using the Laravel framework for a reward system. The app allows users to earn points and redeem them for rewards.</p>
<h2 class="code-line" data-line-start=4 data-line-end=5 ><a id="Installation_4"></a>Installation</h2>
<p class="has-line-data" data-line-start="5" data-line-end="6">To get started with the app, clone the repository and install the dependencies:</p>
<pre><code class="has-line-data" data-line-start="8" data-line-end="12" class="language-sh">git <span class="hljs-built_in">clone</span> https://github.com/MariVillaGat/StageOpdracht.git
<span class="hljs-built_in">cd</span> StageOpdracht
composer install
</code></pre>
<p class="has-line-data" data-line-start="12" data-line-end="13">Next, create a copy of the .env.example file and name it .env. Update the APP_KEY value with a new key using php artisan key:generate. Add your database details to the .env file.</p>
<pre><code class="has-line-data" data-line-start="14" data-line-end="17" class="language-sh">cp .env.example .env
php artisan key:generate
</code></pre>
<p class="has-line-data" data-line-start="17" data-line-end="18">Migrate the database:</p>
<pre><code class="has-line-data" data-line-start="19" data-line-end="21" class="language-sh">php artisan migrate
</code></pre>
<p class="has-line-data" data-line-start="21" data-line-end="22">You can now run the app using:</p>
<pre><code class="has-line-data" data-line-start="23" data-line-end="25" class="language-sh">php artisan serve
</code></pre>
<h2 class="code-line" data-line-start=25 data-line-end=26 ><a id="Features_25"></a>Features</h2>
<ul>
<li class="has-line-data" data-line-start="26" data-line-end="27">User authentication</li>
<li class="has-line-data" data-line-start="27" data-line-end="28">Points tracking</li>
<li class="has-line-data" data-line-start="28" data-line-end="29">Reward redemption</li>
<li class="has-line-data" data-line-start="29" data-line-end="31">Admin dashboard for managing rewards</li>
</ul>
<h2 class="code-line" data-line-start=31 data-line-end=32 ><a id="Contributing_31"></a>Contributing</h2>
<p class="has-line-data" data-line-start="32" data-line-end="33">If you would like to contribute to the project, please fork the repository and submit a pull request.</p>
<h2 class="code-line" data-line-start=34 data-line-end=35 ><a id="License_34"></a>License</h2>
<p class="has-line-data" data-line-start="35" data-line-end="36"><a href="https://choosealicense.com/licenses/mit/">MIT</a></p>
