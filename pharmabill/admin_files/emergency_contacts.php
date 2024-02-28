<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page.php';
    include_once dirname(__FILE__) . '/' . 'components/page/detail_page.php';
    include_once dirname(__FILE__) . '/' . 'components/page/nested_form_page.php';


    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class emergency_contactsPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`emergency_contacts`');
            $this->dataset->addFields(
                array(
                    new IntegerField('ID', true, true, true),
                    new StringField('patient_id', true),
                    new StringField('kin_name', true),
                    new StringField('relationship', true),
                    new StringField('kin_phone', true),
                    new StringField('kin_id', true),
                    new StringField('kin_gender', true)
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(20);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'ID', 'ID', 'ID'),
                new FilterColumn($this->dataset, 'patient_id', 'patient_id', 'Patient Id'),
                new FilterColumn($this->dataset, 'kin_name', 'kin_name', 'Kin Name'),
                new FilterColumn($this->dataset, 'relationship', 'relationship', 'Relationship'),
                new FilterColumn($this->dataset, 'kin_phone', 'kin_phone', 'Kin Phone'),
                new FilterColumn($this->dataset, 'kin_id', 'kin_id', 'Kin Id'),
                new FilterColumn($this->dataset, 'kin_gender', 'kin_gender', 'Kin Gender')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['ID'])
                ->addColumn($columns['patient_id'])
                ->addColumn($columns['kin_name'])
                ->addColumn($columns['relationship'])
                ->addColumn($columns['kin_phone'])
                ->addColumn($columns['kin_id'])
                ->addColumn($columns['kin_gender']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('id_edit');
            
            $filterBuilder->addColumn(
                $columns['ID'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('patient_id_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['patient_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kin_name_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['kin_name'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('relationship_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['relationship'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kin_phone_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['kin_phone'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kin_id_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['kin_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('kin_gender_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['kin_gender'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_patient_id_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_name_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_relationship_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kin_phone field
            //
            $column = new TextViewColumn('kin_phone', 'kin_phone', 'Kin Phone', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_id_handler_list');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for kin_gender field
            //
            $column = new TextViewColumn('kin_gender', 'kin_gender', 'Kin Gender', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_patient_id_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_name_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_relationship_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kin_phone field
            //
            $column = new TextViewColumn('kin_phone', 'kin_phone', 'Kin Phone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_id_handler_view');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for kin_gender field
            //
            $column = new TextViewColumn('kin_gender', 'kin_gender', 'Kin Gender', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for patient_id field
            //
            $editor = new TextEdit('patient_id_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Patient Id', 'patient_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kin_name field
            //
            $editor = new TextEdit('kin_name_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Kin Name', 'kin_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for relationship field
            //
            $editor = new TextEdit('relationship_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Relationship', 'relationship', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kin_phone field
            //
            $editor = new TextEdit('kin_phone_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Phone', 'kin_phone', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kin_id field
            //
            $editor = new TextEdit('kin_id_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Kin Id', 'kin_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for kin_gender field
            //
            $editor = new TextEdit('kin_gender_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Gender', 'kin_gender', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for kin_name field
            //
            $editor = new TextEdit('kin_name_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Kin Name', 'kin_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for relationship field
            //
            $editor = new TextEdit('relationship_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Relationship', 'relationship', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kin_phone field
            //
            $editor = new TextEdit('kin_phone_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Phone', 'kin_phone', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for kin_gender field
            //
            $editor = new TextEdit('kin_gender_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Gender', 'kin_gender', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for patient_id field
            //
            $editor = new TextEdit('patient_id_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Patient Id', 'patient_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kin_name field
            //
            $editor = new TextEdit('kin_name_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Kin Name', 'kin_name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for relationship field
            //
            $editor = new TextEdit('relationship_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Relationship', 'relationship', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kin_phone field
            //
            $editor = new TextEdit('kin_phone_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Phone', 'kin_phone', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kin_id field
            //
            $editor = new TextEdit('kin_id_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Kin Id', 'kin_id', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for kin_gender field
            //
            $editor = new TextEdit('kin_gender_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Kin Gender', 'kin_gender', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_patient_id_handler_print');
            $grid->AddPrintColumn($column);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_name_handler_print');
            $grid->AddPrintColumn($column);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_relationship_handler_print');
            $grid->AddPrintColumn($column);
            
            //
            // View column for kin_phone field
            //
            $column = new TextViewColumn('kin_phone', 'kin_phone', 'Kin Phone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_id_handler_print');
            $grid->AddPrintColumn($column);
            
            //
            // View column for kin_gender field
            //
            $column = new TextViewColumn('kin_gender', 'kin_gender', 'Kin Gender', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for ID field
            //
            $column = new NumberViewColumn('ID', 'ID', 'ID', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_patient_id_handler_export');
            $grid->AddExportColumn($column);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_name_handler_export');
            $grid->AddExportColumn($column);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_relationship_handler_export');
            $grid->AddExportColumn($column);
            
            //
            // View column for kin_phone field
            //
            $column = new TextViewColumn('kin_phone', 'kin_phone', 'Kin Phone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_id_handler_export');
            $grid->AddExportColumn($column);
            
            //
            // View column for kin_gender field
            //
            $column = new TextViewColumn('kin_gender', 'kin_gender', 'Kin Gender', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_patient_id_handler_compare');
            $grid->AddCompareColumn($column);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_name_handler_compare');
            $grid->AddCompareColumn($column);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_relationship_handler_compare');
            $grid->AddCompareColumn($column);
            
            //
            // View column for kin_phone field
            //
            $column = new TextViewColumn('kin_phone', 'kin_phone', 'Kin Phone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('emergency_contactsGrid_kin_id_handler_compare');
            $grid->AddCompareColumn($column);
            
            //
            // View column for kin_gender field
            //
            $column = new TextViewColumn('kin_gender', 'kin_gender', 'Kin Gender', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_patient_id_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_name_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_relationship_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_id_handler_list', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_patient_id_handler_print', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_name_handler_print', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_relationship_handler_print', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_id_handler_print', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_patient_id_handler_compare', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_name_handler_compare', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_relationship_handler_compare', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_id_handler_compare', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for patient_id field
            //
            $column = new TextViewColumn('patient_id', 'patient_id', 'Patient Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_patient_id_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_name field
            //
            $column = new TextViewColumn('kin_name', 'kin_name', 'Kin Name', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_name_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for relationship field
            //
            $column = new TextViewColumn('relationship', 'relationship', 'Relationship', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_relationship_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for kin_id field
            //
            $column = new TextViewColumn('kin_id', 'kin_id', 'Kin Id', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'emergency_contactsGrid_kin_id_handler_view', $column);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        public function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomPagePermissions(Page $page, PermissionSet &$permissions, &$handled)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
    }



    try
    {
        $Page = new emergency_contactsPage("emergency_contacts", "emergency_contacts.php", GetCurrentUserPermissionSetForDataSource("emergency_contacts"), 'UTF-8');
        $Page->SetTitle('Emergency Contacts');
        $Page->SetMenuLabel('Emergency Contacts');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("emergency_contacts"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
