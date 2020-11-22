<?php
class CrudBehavior extends ModelBehavior {
    
    public function setup(Model $model, $settings = array()) {
        $model->editFields = array();
        $model->editContain = array();
        $model->editVirtualFields = array();
        $model->viewFields = array();
        $model->viewContain = array();
        $model->viewVirtualFields = array();
        foreach ($settings as $settingName => $settingValue) {
            $model->{$settingName} = $settingValue;
        }
    }
    
    public function editData(Model $model, $id) {
        $model->virtualFields = array_merge($model->virtualFields, $model->editVirtualFields);
        $contain = $model->editContain;
        $conditions = array($model->name . '.' . $model->primaryKey => $id);
        $fields = $model->editFields;
        $editData = $model->find('first', compact('conditions', 'fields', 'contain'));
        
        return $editData;
    }
     
    public function viewData(Model $model, $id) {
        $model->virtualFields = array_merge($model->virtualFields, $model->viewVirtualFields);
        $contain = $model->viewContain;
        $conditions = array($model->name . '.' . $model->primaryKey => $id);
        $fields = $model->viewFields;
        $viewData = $model->find('first', compact('conditions', 'fields', 'contain'));

        return $viewData;
    }
    
    public function excluir(Model $model, $ids) {
        $fields = array($model->name . '.deleted' => "'" . date('Y-m-d H:i') . "'");
        $conditions = array($model->name . '.' . $model->primaryKey => $ids);
        $model->unbindAll();
        $model->updateAll($fields, $conditions);
        $excluido = $model->find('count', compact('conditions'));

        return $excluido;
    }
    
    public function none(Model $model, $empresaId) {
        $model->contain();
        $conditions = array($model->name . '.empresa_id' => $empresaId, $model->name . '.deleted IS NULL');
        $count = $model->find('count', compact('conditions'));

        return empty($count);
    }
    
    
    
}
?>