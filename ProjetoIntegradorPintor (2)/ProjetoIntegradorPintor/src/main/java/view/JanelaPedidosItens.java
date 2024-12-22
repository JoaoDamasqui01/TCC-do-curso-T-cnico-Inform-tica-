package view;

import dao.EntregasDao;
import dao.ItensDao;
import dao.PedidosDao;
import dao.PedidosItensDao;
import model.Entregas;
import model.Itens;
import model.Pedidos;
import model.PedidosItens;
import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

public class JanelaPedidosItens implements ActionListener {
    JButton btCadastrar, btCancelar;
    JLabel lbPedido, lbIten, lbEntrega, lbQuantidade, lbPrecoUnitario, lbPrecoTotal, lbResult;
    JTextField tfQuantidade, tfPrecoUnitario;
    String [] tiposPedidos;
    String [] tiposItens;
    String [] tiposEntregas;

    JComboBox cbxTiposPedidos, cbxTiposItens, cbxTiposEntregas;

    public JanelaPedidosItens(){
        JFrame janela = new JFrame("Cadastro de Pedidos Itens");
        janela.setSize(400, 300); // tamanho da tela
        janela.setLocationRelativeTo(null); // centraliza na tela
        janela.setLayout(new GridLayout(7, 1, 22,10));

        lbEntrega = new JLabel("Entrega");
        carregarTiposEntregas();
        cbxTiposEntregas = new JComboBox(tiposEntregas);

        lbPedido = new JLabel("Pedido");
        carregarTiposPedidos();
        cbxTiposPedidos = new JComboBox(tiposPedidos);

        lbIten = new JLabel("Item Pedido:");
        carregarTiposItens();
        cbxTiposItens = new JComboBox(tiposItens);

        lbQuantidade = new JLabel("Quantidade:");
        tfQuantidade = new JTextField(20);

        lbPrecoUnitario = new JLabel("Preço Unitário");
        tfPrecoUnitario = new JTextField(20);

        lbPrecoTotal = new JLabel("Preço Total:");
        lbResult = new JLabel("");

        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");

        janela.add(lbIten);
        janela.add(cbxTiposItens);
        janela.add(lbEntrega);
        janela.add(cbxTiposEntregas);
        janela.add(lbQuantidade);
        janela.add(tfQuantidade);
        janela.add(lbPrecoUnitario);
        janela.add(tfPrecoUnitario);
        janela.add(lbPrecoTotal);
        janela.add(lbResult);
        janela.add(btCadastrar);
        janela.add(btCancelar);

        btCadastrar.addActionListener(this);

        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE); // FECHA A JANELA AO TERMINAR
    }

    private void carregarTiposItens() {
        EntityManager em = JPAUtil.getEntityManager();
        ItensDao itensDao = new ItensDao(em);
        List<Itens> todos = itensDao.buscarTodos();
        int numReg = todos.size();
        tiposItens = new String[numReg + 1]; // criar um vetor
        tiposItens[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposItens[i + 1] = todos.get(i).getNomeItem();
        }
    }

    private void carregarTiposPedidos() {
        EntityManager em = JPAUtil.getEntityManager();
        PedidosDao pedidosDao = new PedidosDao(em);
        List<Pedidos> todos = pedidosDao.buscarTodos();
        int numReg = todos.size();
        tiposPedidos = new String[numReg + 1]; // criar um vetor
        tiposPedidos[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposPedidos[i + 1] = String.valueOf(todos.get(i).getIdPedidos());
        }
    }

    public void carregarTiposEntregas(){
        EntityManager em = JPAUtil.getEntityManager();
        EntregasDao entregasDao = new EntregasDao(em);
        List<Entregas> todos = entregasDao.buscarTodos();
        int numReg = todos.size();
        tiposEntregas= new String[numReg + 1]; // criar um vetor
        tiposEntregas[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposEntregas[i + 1] = todos.get(i).getVeiculo();
        }
    }

    public String carregarPrecoTotal(){
        EntityManager em = JPAUtil.getEntityManager();
        PedidosItensDao pedidosItensDao = new PedidosItensDao(em);
        int qtde = Integer.parseInt(tfQuantidade.getText());
        double precoUni = Double.parseDouble(tfPrecoUnitario.getText());
        double precoTotal = qtde * precoUni;

        return String.format("%.2f",precoTotal);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == btCadastrar){
            int qtde = Integer.parseInt(tfQuantidade.getText());
            double PrecoUni = Double.parseDouble(tfPrecoUnitario.getText());
            lbResult.setText(carregarPrecoTotal());
            double PrecoTotal = Double.parseDouble(String.valueOf(lbResult));
            int idItens = cbxTiposItens.getSelectedIndex();
            int idPedidos = cbxTiposPedidos.getSelectedIndex();
            int idEntregas = cbxTiposEntregas.getSelectedIndex();
            PedidosItens pedidosItens = new PedidosItens( idPedidos,idItens, idEntregas, qtde, PrecoUni, PrecoTotal);
            EntityManager em = JPAUtil.getEntityManager();
            PedidosItensDao pedidosItensDao = new PedidosItensDao(em);
            em.getTransaction().begin();
            pedidosItensDao.cadastrar(pedidosItens);
            em.getTransaction().commit();
            em.close();
            JOptionPane.showMessageDialog(null,
                    "Cadastro realizado com sucesso!");
        }
        tfQuantidade.setText(" ");
        tfPrecoUnitario.setText(" ");
    }
}
