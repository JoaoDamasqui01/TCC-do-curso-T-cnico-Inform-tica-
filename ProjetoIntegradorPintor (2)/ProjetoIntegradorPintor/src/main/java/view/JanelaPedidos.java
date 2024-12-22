package view;

import dao.FormasPagamentosDao;
import dao.MarcasDao;
import dao.PedidosDao;
import dao.UsuariosDao;
import model.FormasPagamentos;
import model.Marcas;
import model.Pedidos;
import model.Usuarios;
import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.List;

public class JanelaPedidos implements ActionListener {
    JButton btCadastrar, btCancelar;
    JLabel lbLocali, lbDataPedido, lbTiposPagamentos, lbUsuarios;
    JTextField tfLocali, tfDataPedido;

    String [] tiposPagamentos;
    String [] tiposUsuarios;

    JComboBox cbxTiposPagamentos, cbxTiposUsuarios;

    public JanelaPedidos(){
        JFrame janela = new JFrame("Cadastro de Pedidos");
        janela.setSize(400, 300); // tamanho da tela
        janela.setLocationRelativeTo(null); // centraliza na tela
        janela.setLayout(new GridLayout(5, 1, 22,10));

        lbUsuarios = new JLabel("Informe nome Usuario");
        carregarTiposUsuarios();
        cbxTiposUsuarios = new JComboBox(tiposUsuarios);

        lbTiposPagamentos = new JLabel("Tipo do Pagamento");
        carregarTiposPagamentos();
        cbxTiposPagamentos = new JComboBox(tiposPagamentos);

        lbLocali = new JLabel("Localização");
        tfLocali = new JTextField(20);

        lbDataPedido = new JLabel("Data do Pedido:");
        tfDataPedido = new JTextField(20);

        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");

        janela.add(lbUsuarios);
        janela.add(cbxTiposUsuarios);
        janela.add(lbTiposPagamentos);
        janela.add(cbxTiposPagamentos);
        janela.add(lbDataPedido);
        janela.add(tfDataPedido);
        janela.add(lbLocali);
        janela.add(tfLocali);
        janela.add(btCadastrar);
        janela.add(btCancelar);

        btCadastrar.addActionListener(this);

        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE);
    }

    private void carregarTiposPagamentos() {
        EntityManager em = JPAUtil.getEntityManager();
        FormasPagamentosDao formasPagamentosDao = new FormasPagamentosDao(em);
        List<FormasPagamentos> todos = formasPagamentosDao.buscarTodos();
        int numReg = todos.size();
        tiposPagamentos = new String[numReg + 1]; // criar um vetor
        tiposPagamentos[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposPagamentos[i + 1] = todos.get(i).getPagamentos();
        }
    }

    private void carregarTiposUsuarios() {
        EntityManager em = JPAUtil.getEntityManager();
        UsuariosDao usuariosDao  = new UsuariosDao(em);
        List<Usuarios> todos = usuariosDao.buscarTodos();
        int numReg = todos.size();
        tiposUsuarios = new String[numReg + 1]; // criar um vetor
        tiposUsuarios[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposUsuarios[i + 1] = todos.get(i).getNomeCompleto();
        }
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == btCadastrar){
            String localizacao = tfLocali.getText();
            String dataString = tfDataPedido.getText();
            LocalDate dataPedido = LocalDate.parse(dataString, DateTimeFormatter.ofPattern("dd/MM/yyy"));
            int idUsuarios = cbxTiposUsuarios.getSelectedIndex();
            int idFormasPagamentos = cbxTiposPagamentos.getSelectedIndex();
            Pedidos pedidos = new Pedidos(idFormasPagamentos, idUsuarios,localizacao, dataString);
            EntityManager em = JPAUtil.getEntityManager();
            PedidosDao pedidosDao = new PedidosDao(em);
            em.getTransaction().begin();
            pedidosDao.cadastrar(pedidos);
            em.getTransaction().commit();
            em.close();
            new JanelaPedidosItens();
            JOptionPane.showMessageDialog(null,
                    "Cadastro realizado com sucesso!");
        }
        tfLocali.setText(" ");
        tfDataPedido.setText(" ");
    }
}
