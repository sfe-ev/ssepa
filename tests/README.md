The tests are intended to be invoked with `civix test`, which is (somewhat)
documented at
<http://wiki.civicrm.org/confluence/display/CRMDOC/Create+a+Module+Extension#CreateaModuleExtension-Addaunit-testclass>.

In essence, these steps are necessary to get everything set up properly:

  * Install civix. You can get [civix](https://github.com/totten/civix) alone,
    or along with other useful tools with the [CiviCRM
    Buildkit](https://github.com/civicrm/civicrm-buildkit).

  * Get a working CiviCRM instance ("site") that you can link with civix. This
    can be your regular devolpment/testing instance you also use for other
    stuff -- running tests won't make any changes to it.

  * "Link" the instance with civix, i.e. make it known to civix so it can
    connect to it. (I'm not sure about the exact steps required -- see the
    documentation...)

  * Prepare the instance for CiviTest, as described at
    <http://wiki.civicrm.org/confluence/display/CRM/Setting+up+your+personal+testing+sandbox+HOWTO>.

    Assuming you are using an already existing installation, the necessary
    steps boil down to this:

      + Create a separate CiviCRM database instance for the tests. This is
        important, as tests will destroy the data in the test DB; but the
        instance civix is linked to needs to remain intact -- so you can *not*
        just use the main DB, even if you don't need the CiviCRM instance for
        anything else.

      + Fill the DB with the CiviCRM table structure.

      + Possibly fill it with the generated CiviCRM data. (Normally, this is
        *not* really necessary, as the testsuite will clear/repopulate it
        before the tests anyways. However, it *might* be necessary, if any
        extensions are enabled on the linked site -- see below...)

      + Set up `civicrm/tests/phpunit/CiviTest/civicrm.settings.local.php` on
        the linked site.

  * The `civix test` documentation mentions that the extension to be tested
    needs to be installed on the linked site, which will make civix
    automatically install it on the test DB as well before running the tests.
    This is actually *not* the case for us: any tests that actually care about
    the installed state, will first purge any remnants of the previously
    installed extension, and then explictly install it as needed.

    (This is necessary because some of the tests actually test the installation
    process itself; because there is no guarantee that the DB is in a
    consistent state that allows clean installation without an explicit purge;
    and last but not least, I believe the automatic extension installation is
    actually broken in civix right now...)

    Note that "not installed" in this context means that it's not activated
    (marked as "installed") in the CiviCRM extension manager. The actual code
    however needs to be available in the extension folder, so the tests can
    activate it when necessary.

  * Civix presently has a bug (see https://github.com/totten/civix/pull/57 )
    that makes it fail to set up the extensions folder properly, if CiviCRM
    stores it as a relative path. (That happens when the extensions folder is
    in the same folder as `templates_c` AIUI.) This will probably make the
    testsuite error out -- either because it tries to access a non-existant
    folder; or because it can't find the extensions. (Both the tested
    extension, as well as any extensions that are active on the linked site and
    civix thus tries to auto-install.)

    This could be worked around by changing the location of the extensions
    folder; or in the latter case, by putting all extensions into the CiviCRM
    source tree under civicrm/tools/extensions (this location is always
    accessible) -- but better just get a fixed version of civix...

Now it should be possible to run test for individual classes with `civix test
<classname>` (from the extension's root directory), or run all available tests
with `civix test <absolute path to tests/phpunit directory>`.
