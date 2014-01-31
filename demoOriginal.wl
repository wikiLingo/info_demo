{FULLPAGE()}{FULLPAGE_SECTION(title='wikiLingo' background-image='url(imgs/bg.jpg)')}{DIV(text-align="center" padding="0 15% 0 15%")}<img src="wikiLingo/editor/img/wL3d.png" height="40%" width="40%" />
!wikiLingo
a __wiki__ (language + editor + platform)
''for humans''
    {DIV}{FULLPAGE_SECTION}{FULLPAGE_SECTION(title="What" background-image='url(imgs/bg1.jpg)')}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 25% 0 25%")}
!!What is wikiLingo?
wikiLingo is a new platform for web design. It's completely "What You See Is What You Get" or "WYSIWYG" driven, for a complete visual experience. It has powerful plugin, security, and event architectures for designing your way.
!!!Techies? Scroll right
        {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!Working with plugins
Let's start with something simple, like a tabs interface:
{DIV(padding="0 25% 0 25%")}
-+wikiLingo

{TABS()}
	{TAB(title="Tab 1")}
	    I'm the content in tab 1!
	{TAB}
	{TAB(title="Tab 2")}
	    I'm the content in tab 2!
	{TAB}
{TABS}+-{DIV}
!!!!!The above creates 2 tabs, it injects the css and javascript that is needed to generate the whole interface on demand.
        {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!This is the result
{DIV(padding="0 15% 0 15%" text-align="left")}
{TABS()}
	{TAB(title="Tab 1")}
	    I'm the content in tab 1!
	{TAB}
	{TAB(title="Tab 2")}
	    I'm the content in tab 2!
	{TAB}
{TABS}{DIV}
		    {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!But really, how does it work?
Here there are two wikiLingo plugins used, tabs and tab.  This is the php that makes it happen
[https://github.com/wikiLingo/wikiLingo/blob/master/WikiLingo/Plugin/tab.php|tabs] | [https://github.com/wikiLingo/wikiLingo/blob/master/WikiLingo/Plugin/tab.php|tab]
            {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION}{FULLPAGE_SECTION(title="Why" background-image='url(imgs/bg2.jpg)')}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!Why should developers use wikiLingo?
!!!!!Developing plugins is easy. Utilizing them?  Even easier. wikiLingo uses html5's contenteditable and complements it with javascript, forcing it to act the same in modern browsers. This limits the amount of code needed for a wysiwyg editor, because you are using the browser instead of some monolithic wysiwyg project.
		    {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!Why should designers use wikiLingo?
!!!!!wikiLingo is a living whiteboard. It makes it easy for the designer to connect with the content, using WYSIWYG editing. Drag and drop editing that works how you've always wanted it to. Everything has the capability for customization. What more can you ask for?
		    {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION_SLIDE()}{DIV(text-align="center" padding="0 15% 0 15%")}
!!Why should businesses use wikiLingo?
!!!!!Utilizing wikiLingo can save businesses money because the cost for designers and developers to work together decreases since they don't have to create an API. It's even easy to manage yourself because it works how you want it to.
		    {DIV}{FULLPAGE_SECTION_SLIDE}{FULLPAGE_SECTION}{FULLPAGE_SECTION(title="Try" background-image='url(imgs/bg3.png)')}{DIV(text-align="center" padding="0 15% 0 15%")}
!!Try it yourself
    		{DIV}{FULLPAGE_SECTION}{FULLPAGE}

<a href="https://github.com/wikiLingo/wikiLingo">
	<img style="position: fixed; top: 0; right: 0; border: 0; padding: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png" alt="Fork me on GitHub"/>
</a>

<a href="demo.php" style="position: fixed; bottom: 0px; right: 0px; color: rgba(255,255,255,.25); text-decoration: none;">
techie? click me
</a>