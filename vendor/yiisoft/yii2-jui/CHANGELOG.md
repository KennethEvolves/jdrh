Yii Framework 2 jui extension Change Log
========================================

2.0.7 November 25, 2017
-----------------------

- Bug #45: Fixed missing close icon in `yii\jui\Dialog` (mtangoo)
- Bug #46: `yii\jui\Selectable` add support for `begin()`, `end()` widget methods (fdezmc)
- Enh #56: Use `jQuery` instead of `$` in generated code to avoid conflicts (samdark)
- Chg #55: `yii\jui\AutoComplete::run()` now returns output instead of echoing it (unlimix)
- Chg #72: Updated jQueryUI dependency to use `1.12.1` as minimum version (samdark)


2.0.6 July 22, 2016
-----------------------

- Bug #36: `yii\jui\Draggable` was using wrong event names (samdark)
- Bug #41: `yii\jui\Droppable` and `yii\jui\Resizable` were using wrong event names (samdark)


2.0.5 March 17, 2016
--------------------

- Bug #8607: `yii\jui\Spinner` was using wrong event names (samdark)


2.0.4 May 10, 2015
------------------

- Bug #6: When using `DatePicker` translations, asset was registered without timestamp when asset manager `$appendTimestamp` was enabled (samdark)
- Bug (CVE-2015-3397): Using `Json::htmlEncode()` for safer JSON data encoding in HTML code (samdark, Tomasz Tokarski)


2.0.3 March 01, 2015
--------------------

- Enh #7127: `name` or `model` and `attribute` are no longer required properties of `yii\jui\InputWidget` (nirvana-msu, cebe)


2.0.2 January 11, 2015
----------------------

- Enh #6570: Datepicker now uses fallback to find language files, e.g. application language is `de-DE` and the translation files does not exists, it will use `de` instead (cebe)
- Enh #6471: Datepicker will now show an empty field when value is an empty string (cebe)


2.0.1 December 07, 2014
-----------------------

- no changes in this release.


2.0.0 October 12, 2014
----------------------

- no changes in this release.


2.0.0-rc September 27, 2014
---------------------------

- Chg #1551: Jui datepicker has a new property `$dateFormat` which is used to set the clientOption `dateFormat`.
   The new property does not use the datepicker formatting syntax anymore but uses the same as the `yii\i18n\Formatter`
   class which is the ICU syntax for date formatting, you have to adjust all your DatePicker widgets to use
   the new property instead of setting the dateFormat in the clientOptions (cebe)


2.0.0-beta April 13, 2014
-------------------------

- Bug #1550: fixed the issue that JUI input widgets did not property input IDs. (qiangxue)
- Bug #2514: Jui sortable clientEvents were not working because of wrong naming assumptions. (cebe)
- Enh #2573: Jui datepicker now uses the current application language by default. (andy5)

2.0.0-alpha, December 1, 2013
-----------------------------

- Initial release.
