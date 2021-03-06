<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.5                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2014                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2014
 *
 * Generated from xml/schema/CRM/Sepa/SEPAMandate.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Sepa_DAO_SEPAMandate extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   * @static
   */
  static $_tableName = 'civicrm_sdd_mandate';
  /**
   * static instance to hold the field values
   *
   * @var array
   * @static
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   * @static
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   * @static
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   * @static
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   * @static
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   * @static
   */
  static $_log = true;
  /**
   * ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * A unique mandate reference
   *
   * @var string
   */
  public $reference;
  /**
   * Information about the source of registration of the mandate
   *
   * @var string
   */
  public $source;
  /**
   * Physical tablename for the contract entity being joined, eg contributionRecur or Membership
   *
   * @var string
   */
  public $entity_table;
  /**
   * FK to contract entity table specified in entity_table column.
   *
   * @var int unsigned
   */
  public $entity_id;
  /**
   * by default now()
   *
   * @var datetime
   */
  public $date;
  /**
   * FK to ssd_creditor
   *
   * @var int unsigned
   */
  public $creditor_id;
  /**
   * FK to Contact ID of the debtor
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * Iban of the debtor
   *
   * @var string
   */
  public $iban;
  /**
   * BIC of the debtor
   *
   * @var string
   */
  public $bic;
  /**
   * RCUR for recurrent (default), OOFF for one-shot
   *
   * @var string
   */
  public $type;
  /**
   * Status of the mandate (INIT, OOFF, FRST, RCUR, INVALID, COMPLETE, ONHOLD)
   *
   * @var string
   */
  public $status;
  /**
   *
   * @var datetime
   */
  public $creation_date;
  /**
   * FK to civicrm_contribution
   *
   * @var int unsigned
   */
  public $first_contribution_id;
  /**
   *
   * @var datetime
   */
  public $validation_date;
  /**
   * class constructor
   *
   * @access public
   * @return civicrm_sdd_mandate
   */
  function __construct()
  {
    $this->__table = 'civicrm_sdd_mandate';
    parent::__construct();
  }
  /**
   * return foreign keys and entity references
   *
   * @static
   * @access public
   * @return array of CRM_Core_Reference_Interface
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'creditor_id', 'civicrm_sdd_creditor', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'first_contribution_id', 'civicrm_contribution', 'id');
      self::$_links[] = new CRM_Core_Reference_Dynamic(self::getTableName() , 'entity_id', NULL, 'id', 'entity_table');
    }
    return self::$_links;
  }
  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
          'export' => true,
          'where' => 'civicrm_sdd_mandate.id',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'reference' => array(
          'name' => 'reference',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reference') ,
          'required' => true,
          'maxlength' => 35,
          'size' => CRM_Utils_Type::BIG,
          'export' => true,
          'where' => 'civicrm_sdd_mandate.reference',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Source') ,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'entity_table' => array(
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Table') ,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'entity_id' => array(
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Entity ID') ,
          'required' => true,
        ) ,
        'date' => array(
          'name' => 'date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Mandate signature date') ,
          'required' => true,
        ) ,
        'creditor_id' => array(
          'name' => 'creditor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Creditor ID') ,
          'FKClassName' => 'CRM_Sepa_DAO_SEPACreditor',
        ) ,
        'contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'iban' => array(
          'name' => 'iban',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Iban') ,
          'required' => false,
          'maxlength' => 42,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'bic' => array(
          'name' => 'bic',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Bic') ,
          'maxlength' => 11,
          'size' => CRM_Utils_Type::TWELVE,
        ) ,
        'type' => array(
          'name' => 'type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Type') ,
          'required' => true,
          'maxlength' => 4,
          'size' => CRM_Utils_Type::FOUR,
          'default' => 'RCUR',
        ) ,
        'status' => array(
          'name' => 'status',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Status') ,
          'required' => true,
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'default' => 'INIT',
        ) ,
        'creation_date' => array(
          'name' => 'creation_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('creation date') ,
          'export' => true,
          'where' => 'civicrm_sdd_mandate.creation_date',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'first_contribution_id' => array(
          'name' => 'first_contribution_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('First Contribution (to be deprecated)') ,
          'FKClassName' => 'CRM_Contribute_DAO_Contribution',
        ) ,
        'validation_date' => array(
          'name' => 'validation_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('validation date') ,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @access public
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'reference' => 'reference',
        'source' => 'source',
        'entity_table' => 'entity_table',
        'entity_id' => 'entity_id',
        'date' => 'date',
        'creditor_id' => 'creditor_id',
        'contact_id' => 'contact_id',
        'iban' => 'iban',
        'bic' => 'bic',
        'type' => 'type',
        'status' => 'status',
        'creation_date' => 'creation_date',
        'first_contribution_id' => 'first_contribution_id',
        'validation_date' => 'validation_date',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * returns the names of this table
   *
   * @access public
   * @static
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * returns if this table needs to be logged
   *
   * @access public
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * returns the list of fields that can be imported
   *
   * @access public
   * return array
   * @static
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['sdd_mandate'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * returns the list of fields that can be exported
   *
   * @access public
   * return array
   * @static
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['sdd_mandate'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
